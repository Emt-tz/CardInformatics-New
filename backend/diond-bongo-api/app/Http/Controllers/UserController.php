<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

class UserController extends Controller
{
    public function handleCompleteRegistration(Request $request)
    {
    }

    public function handleUpdateProfile(Request $request)
    {
        $email = $request->email;
        $full_name = $request->full_name;
        $marital_status = $request->marital_status;
        $address = $request->address;
        $ward = $request->ward;
        $street_no = $request->street_no;
        $street = $request->street;
        $region = $request->region;
        $district = $request->district;
        $p_number = $request->p_number;
        $user_reason = $request->user_reason;

        $last_edited        = date('d/m/Y H:i');
        $edited_by          = $email;
        $edited_coz         = "User " . $full_name . " Edit Their Profile Because " . $user_reason;


        // Find the user by user_id and email
        $user = Registration::where('email', $email)
            ->first();

        if ($user) {

            $user->street_no = $street_no;
            $user->ward = $ward;
            $user->marital_status = $marital_status;
            $user->address = $address;
            $user->street = $street;
            $user->region = $region;
            $user->district = $district;
            $user->p_number = $p_number;
            $user->last_edited = $last_edited;
            $user->edited_by = $edited_by;
            $user->edited_coz = $edited_coz;

            $user->save();

            // Json response for success
            $response = [
                'success_notification' => 'Successfully updated profile'
            ];
            return response()->json($response, 200);
        } else {
            // Json response for failure
            $response = [
                'fail_notification' => 'User not found'
            ];
            return response()->json($response, 404);
        }
    }

    public function handleUpdatePicture(Request $request)
    {
        $email = $request->email;

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return response()->json([
                'fail_notification' => 'Validation failed: ' . implode(', ', $errors),
            ], 400);
        }

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');

            // Generate a unique file name
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Save the file to Laravel storage
            $filePath = $file->storeAs('profile_pictures', $fileName, 'public');

            // Update the profile picture path in the database
            try {
                $user = Registration::where('email', $email)->first();

                if (!$user) {
                    return response()->json([
                        'fail_notification' => 'User not found',
                    ], 404);
                }

                $user->profile_pic = $fileName;
                $user->save();

                return response()->json([
                    'success_notification' => 'Profile picture updated successfully',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'fail_notification' => 'Failed to update profile picture: ' . $e->getMessage(),
                ], 500);
            }
        } else {
            return response()->json([
                'fail_notification' => 'Profile picture file not provided',
            ], 400);
        }
    }

    public function handleUpdatePassword(Request $request)
    {
    }

    public function handleUpdateSecurityQuestion(Request $request)
    {
    }
}
