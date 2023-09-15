<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\ApplicantDocument;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\UploadedFile;

class LoanController extends Controller
{
    public $response;

    public function __construct()
    {
        $this->response = new ApiResponse();
    }

    public function handleLoanApplication(Request $request)
    {

        $formData = $request->input('formData');
        $uploadedFiles = $request->File('test');
        return $this->response->sendSuccessResponse($uploadedFiles);
        // Process the incoming data and files
        $response = $this->processIncomingDataAndFiles($formData, $uploadedFiles);

        // Return the response as JSON
        return response()->json($response);
    }

    private function processIncomingDataAndFiles($formData, $uploadedFiles)
    {
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
            'supplimentary_income',
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

        // foreach ($requiredFields as $field) {
        //     if (!isset($formData[$field]) || $formData[$field] === null) {
        //         return $this->response->sendFailureResponse("Error: The field '$field' is required.", 400);
        //     }
        // }
        // $applicant = $this->processFormData($formData);
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
                        //$this->insertApplicantDocument($applicant->id, $fileName, $directory . '/' . $fileName);
                    }
                } catch (\Exception $e) {
                    $this->response->sendFailureResponse($e->getMessage());
                    $fileUploadSuccess = false;
                }
            }
        }

        // Check if all file uploads were successful before processing form data
        // if ($fileUploadSuccess) {
        //     $applicant = $this->processFormData($formData);
        //     return $this->response->sendSuccessResponse('Form data and files uploaded successfully.');
        // } else {
        //     return $this->response; // This response will contain the failure messages.
        // }
    }


    private function processFormData($formData)
    {
        $applicant = Applicant::create($formData);
        return $applicant;
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
