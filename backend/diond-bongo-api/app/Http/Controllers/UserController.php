<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Helpers\UtilsHelper;

class UserController extends Controller
{
    public $utilsHelper;

    public function __construct()
    {
        $this->utilsHelper = new UtilsHelper();
    }

    public function handleCompleteRegistration(Request $request)
    {
        $complete_reg_type = $request->complete_reg_type;

        if ($complete_reg_type == 'register_details') {
            return $this->registerDetails($request);
        } elseif ($complete_reg_type == 'update_details') {
            return $this->updateDetails($request);
        } else {
            return response()->json(['fail_notification' => 'Access Denied']);
        }
    }

    private function updateDetails($request)
    {
        $email = $request->email;
        $name = $request->name;
        $address = $request->address;
        $street = $request->street;
        $district = $request->district;
        $region = $request->region;
        $ward = $request->ward;
        $street_no = $request->street_no;

        $registration = Registration::where("email", $email)->first();

        if (!$registration) {
            return response()->json(['fail_notification' => 'User not found']);
        }

        $registration->address = $address;
        $registration->street = $street;
        $registration->district = $district;
        $registration->region = $region;
        $registration->ward = $ward;
        $registration->street_no = $street_no;

        $registration->save();

        $mailHtml = "
        <img src='cid:logo' >
      <p>
          Ndugu $name, <br/><br/>

          Asante kukamilisha usajili wako na CARD Informatics! Kwa uzoefu bora wa kujivinjari, tafadhali kumbuka kujumuisha taarifa zako zote zinazohitajika ili taasisi zetu za fedha na washirika waweze kuchunguza vizuri ombi lako la mkopo. Hii itaweza kuwezesha majibu ya haraka ya utoaji wa mkopo. Tafadhali zingatia vigezo vifuatavyo: <br/><br/>

          <span style='color: red;'> Tafadhali Zingatia Mahitaji haya Muhimu kwa Uhitimu wa Mikopo: </span> <br/>
              1.  Ombi la mkopo lazima liwe kuanzia Tsh Millioni Moja (TZS 1M) na kuendelea <br/>
              2.  Tunakuhimiza sana kuandikisha dhamana ili kuongeza thamani ya maombi yako <br/>
              3.  Mkopaji lazima aambatishe nakala za PDF za hati zifuatazo kwa uchunguzi wa mapema wa taasisi ya kifedha <br/>

          <br/><br/>

          Kwa Wakopaji Waliojiajiri <br/>
              a.  Kadi ya NIDA, au Leseni ya Udereva ya Tanzania, au Pasipoti <br/>
              b.  Leseni ya Biashara <br/>
              c.  Cheti cha TIN <br/>
              d.  Taarifa ya Benki (miezi 6) au Taarifa ya Pesa kwa Simu ya Mkononi (miezi 6) <br/>
              e.  Anwani ya Biashara <br/>
              f.  Uthibitisho wa Mapato <br/>
              g.  Hati ya Dhamana <br/>


          <br/><br/>

          Kwa Wakopaji Walioajiriwa <br/>
              a.  Kadi ya NIDA, au Leseni ya Udereva ya Tanzania, au Pasipoti <br/>
              b.  Barua ya Ajira kutoka kwa Mwajiri <br/>
              c.  Salary Slip (miezi 6) <br/>
              d.  Taarifa ya Benki (Miezi 6) <br/>

          <br/><br/>

          Tunakushukuru kwa kuendelea kutuunga mkono katika yote tunayofanya. Jisikie huru kututumia maoni kuhusu uzoefu wako wakati unajivinjari kupitia jukwaa letu. <br/><br/>

          Kwa heshima kubwa, <br/>
          The C.A.R.D. Informatics Team
      </p>

      <br/><br/><br/>
      <span align='center'> ********* </span>
      <br/><br/><br/>

      <p>

      Dear $name, <br/><br/>

          Thank you for completing your registration with  CARD Informatics! For the best browsing experience, please remember to include all the required information so that our partner financial institutions can properly vet your loan request ahead of time which may facilitate a faster response on loan issuance. Please pay attention to the following standardized criteria: <br/><br/>

          <span style='color: red;'> Please Note these Key Requirements for Credit Qualification: </span> <br/>

              1.  The loan request must be from TZS 1 Million and above <br/>
              2.  We strongly recommend you enlist a collateral in order to increase your chance to get a loan <br/>
              3.  The borrower must attach PDF copies of the following documents for financial institution prescreening <br/>

          <br/><br/>

          For Self Employed Borrowers <br/>
              a.  NIDA Card, or a Tanzanian Driver’s License, or a Passport <br/>
              b.  Business License <br/>
              c.  TIN Certificate <br/>
              d.  Bank Statement (6 months) or Mobile Money Statement (6 months) <br/>
              e.  Business Address <br/>
              f.  Proof of Income <br/>
              g.  Collateral Document <br/>

          <br/><br/>

          For Employed Borrowers <br/>
              a.  NIDA Card, or a Tanzanian Driver’s License, or a Passport <br/>
              b.  Letter of Employment from the Employer <br/>
              c.  Salary Slip (6 months) <br/>
              d.  Bank Statement (6 Months) <br/>

          <br/><br/>

          Thank you for your continued support in all we do. Feel free to send us feedback regarding your experience while browsing through our platform.<br/><br/>

          With regards,<br/>
          The C.A.R.D. Informatics Team!<br/><br/><br/><br/><br/><br/>

          <span style='color: gray;'> <i>
            Nb.  This email has been auto-generated, please do not respond to the sender. Any information contained herein, including links or attachments, is confidential! It is intended solely for the addressee, and may also be privileged or exempt from disclosure under applicable law. If you are not the addressee, or have received this e-mail in error, please notify the sender immediately, delete it from your system and do not copy, disclose or otherwise act upon any part of this e-mail or its contents. Internet communications are not guaranteed to be secure or virus-free. We do not accept responsibility for any loss from the transmission of any malware that has arisen from unauthorized access or from interference of any internet communications by any third party.
          </span></i>
      </p>";
        $this->utilsHelper->send_email($email, "CARD Informatics Notification ", $mailHtml);

        return response()->json(['success_notification' => 'Success']);
    }

    private function registerDetails($request)
    {

        $email = $request->email;
        $nida_no = $request->nida_no;
        $f_name = $request->first_name . ' ' . $request->middle_name;
        $l_name = $request->l_name;

        $birth_date = date_format(date_create($request->birth_date), 'd/m/Y');
        $gender = $request->gender;
        $marital_status = $request->marital_status;
        $p_number = $request->p_number;
        $citizenship = $request->citizenship;
        $security_question = $request->security_question;
        $security_answer = $request->security_answer;
        $password = md5($request->password);

        $registration = Registration::where("email", $email)->first();

        if (!$registration) {
            return response()->json(['fail_notification' => 'User not found']);
        }

        $verifyNida = Registration::where('nida_no', $nida_no)->count();
        $verifyPass = Registration::where('password', $password)->where('email', $email)->count();
        $verifyNumber = Registration::where('p_number', $p_number)->count();

        if ($verifyNida > 0) {
            return response()->json(['fail_notification' => 'Failed, This NIDA No. already exists, Please select a different NIDA No.']);
        } elseif ($verifyPass > 0) {
            return response()->json(['fail_notification' => 'Failed, Please use a different password']);
        } elseif ($verifyNumber > 0) {
            return response()->json(['fail_notification' => 'Failed, Phone number already exists, Please select a different phone number']);
        } else {
            $registration->nida_no = $nida_no;
            $registration->f_name = $f_name;
            $registration->l_name = $l_name;
            $registration->birth_date = $birth_date;
            $registration->gender = $gender;
            $registration->p_number = $p_number;
            $registration->marital_status = $marital_status;
            $registration->citizenship = $citizenship;
            $registration->security_question = $security_question;
            $registration->security_answer = $security_answer;
            $registration->password = $password;

            $registration->save();

            // Your email sending code here...

            return response()->json(['success_notification' => 'Success']);
        }
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
        $change_step = $request->change_step;
        if ($change_step == 'search_email') {
            $email = $request->email;
            $password = md5($request->password);
            // Attempt select query execution
            $user = Registration::where('email', $email)
                ->where('password', $password)
                ->first();

            if ($user) {
                $p_number = $user->p_number;
                $f_name = $user->f_name;

                $rec_prefix = $this->utilsHelper->recovery_prefix(4);
                $verification_code = rand(111111, 999999);

                $mailHtml = "
                <img src='cid:logo'>
                <p>
                    Ndugu $f_name, <br/><br/>
                    Nenosiri lako la muda mfupi (OTP) kiambishi awali ni: <span style='color: blue; font-weight: bold;'> $rec_prefix</span> na msimbo wa kuweka upya ni: <span style='color: blue; font-weight: bold;'>$verification_code</span>. Tafadhali kumbuka kuwa OTP hii inaisha ndani ya dakika 3 baada ya uzalishaji wake. Ikiwa hukuanzisha ombi hili, tafadhali wasiliana nasi kupitia +255 736 836 936 kwa usaidizi zaidi. <br/><br/>
                    Tunakushukuru kwa kuendelea kutuunga mkono katika yote tunayofanya. Jisikie huru kututumia maoni kuhusu uzoefu wako wakati unajivinjari kupitia jukwaa letu. <br/><br/>
                    Kwa heshima kubwa, <br/>
                    The C.A.R.D. Informatics Team.
                </p>
                <br/><br/><br/>
                <p>
                    Dear $f_name,<br/><br/>
                    Your One-Time Password (OTP) reference prefix is: <span style='color: blue; font-weight: bold;'> $rec_prefix</span> and the reset code is: <span style='color: blue; font-weight: bold;'>$verification_code</span>. Please note that this OTP expires within 3 minutes of its generation. In case you did not initiate this request, please contact us at +255 736 836 936 for further assistance.<br/><br/>
                    Thank you for your continued support in all we do. Feel free to send us feedback regarding your experience while browsing through our platform.<br/><br/>
                    With regards,<br/>
                    The C.A.R.D. Informatics Team.
                    <br/><br/><br/><br/><br/><br/>
                    <span style='color: gray;'> <i>
                        Nb.  This email has been auto-generated, please do not respond to the sender. Any information contained herein, including links or attachments, is confidential! It is intended solely for the addressee, and may also be privileged or exempt from disclosure under applicable law. If you are not the addressee, or have received this e-mail in error, please notify the sender immediately, delete it from your system and do not copy, disclose or otherwise act upon any part of this e-mail or its contents. Internet communications are not guaranteed to be secure or virus-free. We do not accept responsibility for any loss from the transmission of any malware that has arisen from unauthorized access or from interference of any internet communications by any third party.
                    </span></i>
                </p>";

                $smsHtml = "Ndugu $f_name,
Nenosiri lako la muda mfupi (OTP) kiambishi awali ni: $rec_prefix na msimbo wa kuweka upya ni: $verification_code. OTP hii inaisha ndani ya dakika 3.

Dear $f_name,
Your One-Time Password (OTP) reference prefix is: $rec_prefix and the reset code is: $verification_code. OTP expires within 3 mins.";

                $this->utilsHelper->send_email($email, "CARD Informatics Notification (Account Verification)", $mailHtml);
                $this->utilsHelper->message_send($p_number, $smsHtml);
                // Session and response
                Session::put('rec_prefix', $rec_prefix);
                Session::put('user_id', $user->id);
                Session::put('email', $user->email);
                Session::put('nida_no', $user->nida_no);
                Session::put('name', $user->f_name);
                Session::put('security_question', $user->security_question);
                Session::put('verification_code', $verification_code);
                Session::put('start', time()); // taking the current time
                Session::put('expire', Session::get('start') + (60 * 3)); // Ending session in 3 minutes

                $response = [
                    "success_notification" => [
                        'rec_prefix' => $rec_prefix,
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'nida_no' => $user->nida_no,
                        'name' => $user->f_name,
                        'security_question' => $user->security_question,
                        'verification_code' => $verification_code,
                        'start' => Session::get('start'),
                        'expire' => Session::get('expire'),
                    ],
                ];

                return response()->json($response);
            } else {
                $response = [
                    'fail_notification' => "Failed, Incorrect Password",
                ];
                return response()->json($response);
            }
        } elseif ($change_step == 'recovery_pass') {
            // Logic for the recovery_pass step
            $email = $request->email;
            $verification_code = $request->verification_code;
            $verification_code1 = $request->verification_code1;
            $security_answer = $request->security_answer;

            if ($verification_code1 == $verification_code) {
                // Attempt select query execution
                $user = Registration::where('email', $email)
                    ->where('security_answer', $security_answer)
                    ->first();

                if ($user) {
                    // Session and response
                    Session::put('success_notification', "Success, Please enter new password!");
                    Session::put('success', 1);
                    Session::put('start', time()); // taking the current time
                    Session::put('expire', Session::get('start') + (60 * 3)); // Ending session in 3 minutes

                    $response = [
                        'success_notification' => "Success, Please enter new password",
                    ];
                    return response()->json($response);
                } else {
                    $response = [
                        'fail_notification' => "Failed, Invalid security answer",
                    ];
                    return response()->json($response);
                }
            } else {
                $response = [
                    'fail_notification' => "Failed, Invalid verification code",
                ];
                return response()->json($response);
            }
        } elseif ($change_step == 'update_pass') {
            // Logic for the update_pass step
            $email = $request->email;
            $password = md5($request->password);

            $user = Registration::where('email', $email)
                ->first();

            if ($user) {
                $user->password = $password;
                $user->save();

                $response = [
                    'success_notification' => "Success",
                ];
                return response()->json($response);
            } else {
                $response = [
                    'fail_notification' => "Failed, System time-out",
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'fail_notification' => "Access Denied",
            ];
            return response()->json($response);
        }
    }

    public function handleUpdateSecurityQuestion(Request $request)
    {
        $change_step = $request->change_step;

        if ($change_step == 'change_sec_step_1') {
            // Logic for step 1
            $email = $request->email;
            $password = md5($request->password);
            $security_question = $request->security_question;
            $security_answer = $request->security_answer;

            $user = Registration::where('email', $email)
                ->first();

            if ($user) {
                if ($password == $user->password) {
                    if ($security_question == $user->security_question) {
                        if ($security_answer == $user->security_answer) {
                            $rec_prefix = $this->utilsHelper->recovery_prefix(4);
                            $verification_code = rand(111111, 999999);

                            // Send email and SMS
                            $mailHtml = "
                    <img src='cid:logo' >
                    <p>
                    Ndugu $user->f_name, <br/><br/>

                    Nenosiri lako la muda mfupi (OTP) kiambishi awali ni: <span style='color: blue; font-weight: bold;'> $rec_prefix</span> na msimbo wa kuweka upya ni: <span style='color: blue; font-weight: bold;'>$verification_code</span>. Tafadhali kumbuka kuwa OTP hii inaisha ndani ya dakika 3 baada ya uzalishaji wake. Ikiwa hukuanzisha ombi hili, tafadhali wasiliana nasi kupitia +255 736 836 936 kwa usaidizi zaidi. <br/><br/>

                    Tunakushukuru kwa kuendelea kutuunga mkono katika yote tunayofanya. Jisikie huru kututumia maoni kuhusu uzoefu wako wakati unajivinjari kupitia jukwaa letu. <br/><br/>

                    Kwa heshima kubwa, <br/>
                    The C.A.R.D. Informatics Team.
                    </p>

                    <br/><br/><br/>

                    <p>
                    Dear $user->f_name,<br/><br/>
                    Your One-Time Password (OTP) reference prefix is: <span style='color: blue;
                    font-weight: bold;'> $rec_prefix</span> and the reset code is : <span style='color: blue; font-weight: bold;'>$verification_code</span>. Please note that this OTP expires within 3 minutes of its generation. In case you did not initiate this request, please contact us at +255 736 836 936 for further assistance.<br/><br/>

                    Thank you for your continued support in all we do. Feel free to send us feedback regarding your experience while browsing through our platform.<br/><br/>

                    With regards,<br/>
                    The C.A.R.D. Informatics Team.<br/><br/><br/><br/><br/><br/>

                    <span style='color: gray;'> <i>
                     Nb.  This email has been auto-generated, please do not respond to the sender. Any information contained herein, including links or attachments, is confidential! It is intended solely for the addressee, and may also be privileged or exempt from disclosure under applicable law. If you are not the addressee, or have received this e-mail in error, please notify the sender immediately, delete it from your system and do not copy, disclose or otherwise act upon any part of this e-mail or its contents. Internet communications are not guaranteed to be secure or virus-free. We do not accept responsibility for any loss from the transmission of any malware that has arisen from unauthorized access or from interference of any internet communications by any third party.
                    </span></i>
                  </p>";

                            $smsHtml = "Dear $user->f_name,
Nenosiri lako la muda mfupi (OTP) kiambishi awali ni : $rec_prefix na msimbo wa kuweka upya ni : $verification_code.  OTP hii inaisha ndani ya dakika 3.

Dear $user->f_name,
Your One-Time Password (OTP) reference prefix is: $rec_prefix and the reset code is : $verification_code. OTP expires within 3 mins.";


                            $this->utilsHelper->send_email($email, "CARD Informatics Notification (Security Change)", $mailHtml);
                            $this->utilsHelper->message_send($user->p_number, $smsHtml);

                            // Session and response
                            Session::put('rec_prefix', $rec_prefix);
                            Session::put('email', $email);
                            Session::put('verification_code', $verification_code);
                            Session::put('start', time());
                            Session::put('expire', Session::get('start') + (60 * 5));

                            $response = [
                                "success_notification" => [
                                    'rec_prefix' => $rec_prefix,
                                    'email' => $email,
                                    'verification_code' => $verification_code,
                                    'start' => Session::get('start'),
                                    'expire' => Session::get('expire'),
                                    'success_notification' => "Success, Please check your Phone or email for your one-time passcode",
                                ],
                            ];
                            return response()->json($response);
                        } else {
                            $response = [
                                'fail_notification' => "Failed, Incorrect security answer",
                            ];
                            return response()->json($response);
                        }
                    } else {
                        $response = [
                            'fail_notification' => "Failed, Incorrect security question",
                        ];
                        return response()->json($response);
                    }
                } else {
                    $response = [
                        'fail_notification' => "Failed, Incorrect password",
                    ];
                    return response()->json($response);
                }
            } else {
                $response = [
                    'fail_notification' => "Failed, System time-out",
                ];
                return response()->json($response);
            }
        } elseif ($change_step == 'change_sec_step_2') {
            // Logic for step 2
            $email = $request->email;
            $verification_code = $request->verification_code;
            $verification_code1 = $request->verification_code1;
            $security_question = $request->security_question;
            $security_answer = $request->security_answer;

            if ($verification_code == $verification_code1) {
                $user = Registration::where('email', $email)
                    ->first();

                if ($user) {
                    $user->security_question = $security_question;
                    $user->security_answer = $security_answer;
                    $user->save();

                    $response = [
                        'success_notification' => "Success",
                    ];
                    return response()->json($response);
                } else {
                    $response = [
                        'fail_notification' => "Failed, System time-out",
                    ];
                    return response()->json($response);
                }
            } else {
                $response = [
                    'fail_notification' => "Failed, Incorrect Verification Code",
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'fail_notification' => "Invalid operation",
            ];
            return response()->json($response);
        }
    }
}
