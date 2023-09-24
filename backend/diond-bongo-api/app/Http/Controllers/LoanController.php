<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Helpers\UtilsHelper;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\UploadedFile;

class LoanController extends Controller
{
    public $response;
    public $utilsHelper;

    public function __construct()
    {
        $this->response = new ApiResponse();
        $this->utilsHelper = new UtilsHelper();
    }

    public function handleLoadLoanForm()
    {
        // Get the path to the JSON file in the storage directory
        $jsonFilePath = storage_path('configs/loanForm.json');
        // Check if the JSON file exists
        if (file_exists($jsonFilePath)) {
            // Read the JSON content
            $jsonData = file_get_contents($jsonFilePath);
            // Return the JSON data as a response
            return response()->json(json_decode($jsonData));

        } else {
            // JSON file not found, return an error response or handle it as needed
            return $this->response->sendFailureResponse("Loan Form file not found");
        }
    }

    public function handleGetUserLoans(Request $request, $user_id)
    {
        // Get the loan_status query parameter
        $loanStatus = $request->query('loan_status');

        // Initialize the query builder
        $query = Applicant::where('user_id', $user_id);

        // Conditionally add the loan_status filter
        if ($loanStatus) {
            $query->where('loan_status', $loanStatus);
        }

        // Execute the query
        $loans = $query->get();

        // Check if any loans were found
        if ($loans->isEmpty()) {
            $message = $loanStatus ? 'You haven\'t been approved for any loans yet' : 'You haven\'t applied for any loans yet';
            return $this->response->sendFailureResponse($message);
        }

        // Construct a JSON response with the loan data
        $loanData = [];
        foreach ($loans as $loan) {
            $loanData[] = [
                'application_code' => $loan->application_code,
                'application_date' => $loan->application_date,
                'loan_requested' => $loan->loan_requested,
                'purpose_of_loan' => $loan->purpose_of_loan,
                'currency' => $loan->currency,
                'amount_requested' => $loan->amount_requested,
                'loan_status' => $loan->loan_status,
                'details' => $loan->details,
            ];
        }

        return $this->response->sendSuccessResponse($loanData);
    }

    public function handleLoanApplication(Request $request)
    {

        $formData = $request->input('formData');
        $uploadedFiles = $request->File('files');
        $this->utilsHelper->log($request->all());
        // Process the incoming data and files
        $response = $this->processIncomingDataAndFiles($formData, $uploadedFiles);

        // Return the response as JSON
        return $response;
    }

    private function processIncomingDataAndFiles($formData, $uploadedFiles)
    {
        //return $this->response->sendFailureResponse($formData);
        // Validate required fields
        $requiredFields = [
            'user_id',
            'type_of_loan',
            'currency',
            'loan_amount',
            'purpose_of_loan',
            'existing_loan',
            'lender',
            'total_existing_loan',
            'employer',
            'designation',
            'employed_from',
            'employed_to',
            'previous_employer',
            'previous_designation',
            'previous_employed_from',
            'previous_employed_to',
            'annual_salary',
            //'supplimentary_income',
            's_employed_income',
            'other_income',
            'income_source',
            'business_name',
            'business_location',
            'business_type',
            'collateral_name',
            'collateral_value',
            'R_nida_no',
            'R_f_name',
            'R_birth_date',
            'R_martial_status',
            'R_professional',
            'R_email',
            'R_p_number',
        ];

        $jsonData = json_decode($formData, true);
        // Initialize an array to store missing or null fields
        $missingFields = [];

        // Loop through the required fields
        foreach ($requiredFields as $field) {
            // Check if the field exists and is not null
            if (!isset($jsonData[$field]) || $jsonData[$field] === null) {
                $missingFields[] = $field;
            }
        }

        // Check if any required fields are missing or null
        if (!empty($missingFields)) {
            // Construct an error message listing the missing fields
            $errorMessage = "Error: The following fields are required or null: " . implode(', ', $missingFields);

            return $this->response->sendFailureResponse($errorMessage, 400);
        }

        $applicant = $this->processFormData($formData);
        // Create the "applicant_files" directory if it doesn't exist
        $directory = 'public/applicant_files/' . now()->toDateString();
        Storage::makeDirectory($directory);

        // Keep track of whether any file uploads fail
        $fileUploadSuccess = true;

        // Iterate over each uploaded file and handle the uploads
        foreach ($uploadedFiles as $file) {
            if ($file instanceof UploadedFile) {
                try {
                    // Check if the file is a PDF
                    if ($file->getClientOriginalExtension() !== 'pdf') {
                        $this->response->sendFailureResponse("Error: Invalid file type. Only PDF files are allowed.");
                        $fileUploadSuccess = false;
                    } else {
                        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $fileExtension = '.pdf';
                        $uniqueFileName = $originalFileName . '_' . time() . '_' . mt_rand(1000, 9999) . $fileExtension;
                        $fileName = $this->sanitizeFileName($uniqueFileName);
                        // Store the file in the storage directory
                        $file->storeAs($directory, $fileName);
                        // Insert file details into the applicant_documents table
                        $this->insertApplicantDocument($applicant->id, $fileName, $directory . '/' . $fileName);
                    }
                } catch (\Exception $e) {
                    $this->response->sendFailureResponse($e->getMessage());
                    $fileUploadSuccess = false;
                }
            }
        }

        return $this->response->sendSuccessResponse('Form data and files uploaded successfully.');
    }

    private function processFormData($formData)
    {
        try {
            $applicant = Applicant::create($formData);
            return $applicant;
        } catch (\Exception $e) {
            $error = $e->getMessage();
            \Log::error($error);
            return null;
        }
    }

    private function insertApplicantDocument($applicantId, $fileName, $filePath)
    {
        // Insert file details into the applicant_documents table
        ApplicantDocument::create([
            'applicant_id' => $applicantId,
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);
    }

    private function sanitizeFileName($fileName)
    {
        $sanitizedFileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $fileName);
        return $sanitizedFileName;
    }
}
