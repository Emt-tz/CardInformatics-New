<?php

namespace App\Http\Controllers;

use App\Models\Loginlog;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\UtilsHelper;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DateTime;

class AuthController extends Controller
{
    public $utilsHelper;

    public function __construct()
    {
        $this->utilsHelper = new UtilsHelper();
    }

    public function handleLogin(Request $request)
    {
        $ip_address = $this->utilsHelper->getIpAddr();
        $time = time() - 180;

        $total_count = $total_count = Loginlog::where('TryTime', '>', $time)
            ->where('IpAddress', $ip_address)
            ->count();

        if ($total_count == 3) {
            // Account suspended response
            return response()->json([
                'fail_notification' => 'You have exceeded your sign-in attempts, and your account has been temporarily suspended. Please contact us for assistance.',
            ], 400);
        } else {
            $json_data = json_decode($request->getContent());
            $username = $json_data->username;
            $password = $json_data->password;

            // Process data and validate user credentials
            $user = Registration::where('email', $username)
            ->orWhere('p_number', $username)
            ->first();

            if ($user) {
                if ($user->status == 0) {
                    if ($user->account_status == 1) {
                        // Check password and perform actions
                        if (md5($password) == $user->password) {
                            if ($user->role == 2) {
                                Loginlog::where('IpAddress', $ip_address)->delete();
                                $filteredProperties = [
                                    'id',
                                    'nida_no',
                                    'f_name',
                                    'l_name',
                                    'gender',
                                    'marital_status',
                                    'birth_date',
                                    'citizenship',
                                    'email',
                                    'ward',
                                    'street_no',
                                    'street',
                                    'district',
                                    'region',
                                    'p_number',
                                    'marital_status',
                                    'address',
                                    'profile_pic',
                                    'security_question',
                                    'security_answer',
                                ];

                                $filteredUser = [];
                                foreach ($filteredProperties as $property) {
                                    if ($property === 'id') {
                                        $filteredUser["user_id"] = (string) $user->$property;
                                    } elseif ($property === 'profile_pic') {
                                        $filteredUser["profile_pic"] = asset('storage/profile_pictures/' . $user->$property);
                                    } else {
                                        $filteredUser[$property] = $user->$property;
                                    }
                                }

                                $response = [
                                    'success_notification' => [
                                        'user_id_prefix' => 'CI' . date('my'),
                                    ] + $filteredUser,
                                ];

                                return response()->json($response);
                            } else {
                                // Handle other roles
                                return response()->json([
                                    'fail_notification' => 'Please use websites to login',
                                ], 400);
                            }
                        } else {
                            // Handle incorrect password
                            $f_name = $user->f_name;
                            $p_number = $user->p_number;

                            // Send email and SMS, then respond with a message
                            $this->sendEmailAndSMS($user->email, $f_name, $p_number);

                            $total_count++;

                            if ($total_count == 3) {
                                // Lock the account
                                $this->lockAccount($user->email);
                            }

                            return response()->json([
                                'fail_notification' => 'Please enter valid sign-in details or reset your password. ' . (3 - $total_count) . ' attempts remain before account suspension.',
                            ], 400);
                        }
                    } else {
                        // Handle account not verified
                        return response()->json([
                            'fail_notification' => 'Please verify your account.',
                        ], 400);
                    }
                } else {
                    // Handle locked account
                    return response()->json([
                        'fail_notification' => 'Your account has been locked. Please contact the call center for assistance.',
                    ], 400);
                }
            } else {
                return response()->json([
                    'fail_notification' => 'Invalid Account ' . $user,
                ], 400);
            }
        }
    }

    public function handleRegistration(Request $request)
    {
        $regType = strtolower($request->reg_type);
        if ($regType == 'tanzanian') {
            return $this->handleTanzanianRegistration($request);
        } elseif ($regType == 'foreigner') {
            return $this->handleForeignerRegistration($request);
        } else {
            $response = array(
                'fail_notification' => "Invalid Request"
            );
            return response()->json($response, 400);
        }
    }

    public function handleForeignerRegistration(Request $request)
    {
        // Validate the incoming registration data
        $validator = Validator::make($request->all(), [
            'nida_no' => 'required|unique:registration,nida_no|min:20',
            'passport_no' => 'required',
            'tin_no' => 'required',
            'm_name' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'marital_status' => 'required',
            'p_number' => 'required|unique:registration,p_number|min:11',
            'citizenship' => 'required',
            'email' => 'required|email|unique:registration,email',
            'security_question' => 'required',
            'security_answer' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'fail_notification' => 'Validation failed: ' . implode(', ', $validator->errors()->all()),
            ], 400);
        }

        try {
            $nida_no = $request->input('nida_no');
            $passport_no = $request->input('passport_no');
            $tin_no = $request->input('tin_no');
            $f_name = $request->input('f_name');
            $l_name = $request->input('l_name');
            $birth_date = $request->input('birth_date');
            $gender = $request->input('gender');
            $marital_status = $request->input('marital_status');
            $p_number = $request->input('p_number');
            $citizenship = $request->input('citizenship');
            $email = $request->input('email');
            $security_question = $request->input('security_question');
            $security_answer = $request->input('security_answer');
            $password = md5($request->input('password'));

            // Generate OTP and send it via email
            $rec_prefix = $this->utilsHelper->recovery_prefix(4);
            $verification_id = rand(111111, 999999);

            $mailHtml = "
                  <img src='cid:logo' >
                  <p>
                  Ndugu $f_name, <br/><br/>

                  Nenosiri lako la muda mfupi (OTP) kiambishi awali ni : <span style='color: blue; font-weight: bold;'> $rec_prefix</span> na msimbo wa kuweka upya ni :<span style='color: blue; font-weight: bold;'>$verification_id</span>. Tafadhali kumbuka kuwa OTP hii inaisha ndani ya dakika 3 baada ya uzalishaji wake. Ikiwa hukuanzisha ombi hili, tafadhali wasiliana nasi kupitia +255 736 836 936 kwa usaidizi zaidi. <br/><br/>

                  Tunakushukuru kwa kuendelea kutuunga mkono katika yote tunayofanya. Jisikie huru kututumia maoni kuhusu uzoefu wako wakati unajivinjari kupitia jukwaa letu. <br/><br/>

                  Kwa heshima kubwa, <br/>
                  The C.A.R.D. Informatics Team!
                  </p>

                  <br/><br/><br/

                  <p>
                    Dear $f_name,<br/><br/>
                    Your One-Time Password (OTP) reference prefix is: <span style='color: blue; font-weight: bold;'> $rec_prefix</span> and the reset code is : <span style='color: blue; font-weight: bold;'>$verification_id</span>. Please note that this OTP expires within 3 minutes of its generation. In case you did not initiate this request, please contact us at +255 736 836 936 980 for further assistance.<br/><br/>

                    Thank you for your continued support in all we do. Feel free to send us feedback regarding your experience while browsing through our platform.<br/><br/>

                    With regards,<br/>
                    The C.A.R.D. Informatics Team!<br/><br/><br/><br/><br/><br/>

                    <span style='color: gray;'> <i>
                      Nb.  This email has been auto-generated, please do not respond to the sender. Any information contained herein, including links or attachments, is confidential! It is intended solely for the addressee, and may also be privileged or exempt from disclosure under applicable law. If you are not the addressee, or have received this e-mail in error, please notify the sender immediately, delete it from your system and do not copy, disclose or otherwise act upon any part of this e-mail or its contents. Internet communications are not guaranteed to be secure or virus-free. We do not accept responsibility for any loss from the transmission of any malware that has arisen from unauthorized access or from interference of any internet communications by any third party.
                    </span></i>
                  </p>";


            $smsHtml = "Ndugu $f_name,
Nenosiri lako la muda mfupi (OTP) imetumwa kwa barua pepe yako ($email), OTP hii inaisha ndani ya dakika 3.

Dear $f_name,
Your One-Time Password (OTP) has been sent to your registered email ($email), OTP expires within 5 mins.   ";

            $this->utilsHelper->message_send($p_number, $smsHtml);
            $this->utilsHelper->send_email($email, "CARD Informatics Notification (Account Verification)", $mailHtml);
            //Insert user data into the database
            $user = new Registration();
            $user->nida_no = $nida_no;
            $user->passport_no = $passport_no;
            $user->tin_no = $tin_no;
            $user->f_name = $f_name;
            $user->l_name = $l_name;
            $user->birth_date = DateTime::createFromFormat('d/m/Y', $birth_date);
            $user->gender = $gender;
            $user->marital_status = $marital_status;
            $user->p_number = $p_number;
            $user->citizenship = $citizenship;
            $user->email = $email;
            $user->security_question = $security_question;
            $user->security_answer = $security_answer;
            $user->password = $password;
            $user->date  = date('d/m/Y H:i');
            $user->save();
            // Return a success response
            return response()->json([
                'success_notification' => [
                    'Verification_send' => $verification_id,
                    'rec_prefix' => $rec_prefix,
                    'email' => $email,
                    'start' => time(),
                    'expire' => time() + (60 * 5),
                    'message' => 'Your account has been created. Please check your Mobile Phone or Email for one-time passcode! Be sure to check your spam mailbox if the message is not in your inbox.',
                ],
            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return response()->json([
                'fail_notification' => 'Registration failed. Please try again later.' . $e->getMessage(),
            ], 500);
        }
    }

    public function handleTanzanianRegistration(Request $request)
    {
        // Validate the incoming registration data
        $validator = Validator::make($request->all(), [
            'nida_no' => 'required|unique:registration,nida_no|min:20',
            'm_name' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'p_number' => 'required|unique:registration,p_number|min:11',
            'citizenship' => 'required',
            'email' => 'required|email|unique:registration,email',
            'security_question' => 'required',
            'security_answer' => 'required',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'fail_notification' => 'Validation failed: ' . implode(', ', $validator->errors()->all()),
            ], 400);
        }
        // Registration logic (database insert, email sending, etc.)
        try {
            $nida_no = $request->input('nida_no');
            $f_name = $request->input('f_name');
            $l_name = $request->input('l_name');
            $birth_date = $request->input('birth_date');
            $gender = $request->input('gender');
            $marital_status = $request->input('marital_status');
            $p_number = $request->input('p_number');
            $citizenship = $request->input('citizenship');
            $email = $request->input('email');
            $security_question = $request->input('security_question');
            $security_answer = $request->input('security_answer');
            $password = md5($request->input('password'));
            // Generate OTP and send it via email
            $rec_prefix = $this->utilsHelper->recovery_prefix(4);
            $verification_id = rand(111111, 999999);

            $mailHtml = "
                  <img src='cid:logo' >
                  <p>
                  Ndugu $f_name, <br/><br/>

                  Nenosiri lako la muda mfupi (OTP) kiambishi awali ni : <span style='color: blue; font-weight: bold;'> $rec_prefix</span> na msimbo wa kuweka upya ni :<span style='color: blue; font-weight: bold;'>$verification_id</span>. Tafadhali kumbuka kuwa OTP hii inaisha ndani ya dakika 3 baada ya uzalishaji wake. Ikiwa hukuanzisha ombi hili, tafadhali wasiliana nasi kupitia +255 736 836 936 kwa usaidizi zaidi. <br/><br/>

                  Tunakushukuru kwa kuendelea kutuunga mkono katika yote tunayofanya. Jisikie huru kututumia maoni kuhusu uzoefu wako wakati unajivinjari kupitia jukwaa letu. <br/><br/>

                  Kwa heshima kubwa, <br/>
                  The C.A.R.D. Informatics Team!
                  </p>

                  <br/><br/><br/

                  <p>
                    Dear $f_name,<br/><br/>
                    Your One-Time Password (OTP) reference prefix is: <span style='color: blue; font-weight: bold;'> $rec_prefix</span> and the reset code is : <span style='color: blue; font-weight: bold;'>$verification_id</span>. Please note that this OTP expires within 3 minutes of its generation. In case you did not initiate this request, please contact us at +255 736 836 936 980 for further assistance.<br/><br/>

                    Thank you for your continued support in all we do. Feel free to send us feedback regarding your experience while browsing through our platform.<br/><br/>

                    With regards,<br/>
                    The C.A.R.D. Informatics Team!<br/><br/><br/><br/><br/><br/>

                    <span style='color: gray;'> <i>
                      Nb.  This email has been auto-generated, please do not respond to the sender. Any information contained herein, including links or attachments, is confidential! It is intended solely for the addressee, and may also be privileged or exempt from disclosure under applicable law. If you are not the addressee, or have received this e-mail in error, please notify the sender immediately, delete it from your system and do not copy, disclose or otherwise act upon any part of this e-mail or its contents. Internet communications are not guaranteed to be secure or virus-free. We do not accept responsibility for any loss from the transmission of any malware that has arisen from unauthorized access or from interference of any internet communications by any third party.
                    </span></i>
                  </p>";


            $smsHtml = "Ndugu $f_name,
Nenosiri lako la muda mfupi (OTP) imetumwa kwa barua pepe yako ($email), OTP hii inaisha ndani ya dakika 3.

Dear $f_name,
Your One-Time Password (OTP) has been sent to your registered email ($email), OTP expires within 5 mins.   ";

            $this->utilsHelper->message_send($p_number, $smsHtml);
            $this->utilsHelper->send_email($email, "CARD Informatics Notification (Account Locked)", $mailHtml);
            //Insert user data into the database
            $user = new Registration();
            $user->nida_no = $nida_no;
            $user->f_name = $f_name;
            $user->l_name = $l_name;
            $user->birth_date = DateTime::createFromFormat('d/m/Y', $birth_date);
            $user->gender = $gender;
            $user->marital_status = $marital_status;
            $user->p_number = $p_number;
            $user->citizenship = $citizenship;
            $user->email = $email;
            $user->security_question = $security_question;
            $user->security_answer = $security_answer;
            $user->password = $password;
            $user->date  = date('d/m/Y H:i');
            $user->save();
            // Return a success response
            return response()->json([
                'success_notification' => [
                    'Verification_send' => (int) $verification_id,
                    'rec_prefix' => $rec_prefix,
                    'email' => $email,
                    'start' => time(),
                    'expire' => time() + (60 * 5),
                    'message' => 'Your account has been created. Please check your Mobile Phone or Email for one-time passcode! Be sure to check your spam mailbox if the message is not in your inbox.',
                ],
            ], 200);
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return response()->json([
                'fail_notification' => 'Registration failed. Please try again later.' . $e->getMessage(),
            ], 500);
        }
    }

    private function lockAccount($user)
    {

        $mailHtml = "
        <img src='cid:logo'>

        <h3 align='center'> AKAUNTI IMEFUNGWA </h3>
        <p>
        Ndugu $user->f_name, <br/><br/>
        Akaunti yako imefugwa na nenosiri lako limesitishwa. <br/>
        Tafadhali wasiliana nasi kwa +255 736 836 936 kwa maelezo zaidi na kutatua suala hili. <br/> <br/>

        Tunakushukuru kwa kuendelea kutuunga mkono katika yote tunayofanya. Jisikie huru kututumia maoni kuhusu uzoefu wako wakati unajivinjari kupitia jukwaa letu. <br/><br/>
        Kwa heshima kubwa, <br/>
        The C.A.R.D. Informatics Team
        </p>

        <br/><br/><br/>

        <h3 align='center'> ACCOUNT LOCKED </h3>
        <p>
        Dear $user->f_name,<br/><br/>
            Your account has been locked and your password has been deactivated!
            Please contact us at +255 736 836 936 for further assistance.<br/><br/>

            Thank you for your continued support in all we do.
            Feel free to send us feedback regarding your experience while browsing through our platform.<br/><br/>

            With regards,<br/>
            The C.A.R.D. Informatics Team!<br/><br/><br/><br/><br/><br/>

            <span style='color: gray;'> <i>
              Nb.  This email has been auto-generated, please do not respond to the sender. Any information contained herein, including links or attachments, is confidential! It is intended solely for the addressee, and may also be privileged or exempt from disclosure under applicable law. If you are not the addressee, or have received this e-mail in error, please notify the sender immediately, delete it from your system and do not copy, disclose or otherwise act upon any part of this e-mail or its contents. Internet communications are not guaranteed to be secure or virus-free. We do not accept responsibility for any loss from the transmission of any malware that has arisen from unauthorized access or from interference of any internet communications by any third party.
            </span></i>
        </p>
            ";

        $smsHtml = "Ndugu $user->f_name,
Akaunti yako imefugwa na nenosiri lako limesitishwa! Tafadhali wasiliana nasi kwa +255 736 836 936 kwa maelezo zaidi.

Dear $user->f_name,
Your account has been locked and your password has been deactivated! Please contact us at +255 736 836 936 for further assistance.";
        $ip_address = $this->utilsHelper->getIpAddr();
        $locking_cz = 'Trying password three times';
        $Adm_email = 'Auto Locked';
        $locked_date = date('d/m/Y H:i');
        $temp_expiry = mktime(0, 0, 0, date("m"), date("d") + 100, date("Y"));
        $locked_date1 = date('Y-m-d', $temp_expiry);

        DB::table('loginlogs')->where('IpAddress', $ip_address)->delete();

        DB::table('registration')
            ->where('email', $user->email)
            ->update([
                'status' => 1,
                'locking_cz' => $locking_cz,
                'Adm_email' => $Adm_email,
                'locked_date' => $locked_date,
                'locked_date1' => $locked_date1,
            ]);
        $this->utilsHelper->message_send($user->p_number, $smsHtml);
        $this->utilsHelper->send_email($user->email, "CARD Informatics Notification (Account Locked)", $mailHtml);
    }
}
