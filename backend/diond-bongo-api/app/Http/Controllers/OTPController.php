<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use App\Helpers\UtilsHelper;

class OTPController extends Controller
{
    public $utilsHelper;

    public function __construct()
    {
        $this->utilsHelper = new UtilsHelper();
    }

    public function handleOTP(Request $request)
    {
        $otp_type = strtolower($request->otp_type);

        if ($otp_type == 'verify') {
            return $this->verifyOTP($request);
        } elseif ($otp_type == 'request') {
            return $this->requestOTP($request);
        } else {
            return response()->json([
                'fail_notification' => 'Invalid operation',
            ]);
        }
    }

    private function verifyOTP($data)
    {
        try {
            $verification_code = $data->verification_code;
            $verification_id = $data->verification_id;
            $email = $data->email;

            if ($verification_code == $verification_id) {
                $user = Registration::where('email', $email)->first();

                if ($user) {
                    if ($user->account_status == 0) {
                        $user->update(['account_status' => 1]);

                        return response()->json([
                            'data' => 'Success, Your account is now active',
                        ]);
                    } else {
                        return response()->json([
                            'fail_notification' => 'Your account is already verified',
                        ]);
                    }
                } else {
                    return response()->json([
                        'fail_notification' => 'Failed, This Invalid email',
                    ]);
                }
            } else {
                return response()->json([
                    'fail_notification' => 'Failed, Invalid verification code' . $verification_code . $verification_id,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'fail_notification' => 'Failed to verify otp\n' . $e,
            ]);
        }
    }

    private function requestOTP($data)
    {
        try {
            $email = $data->email;

            $user = Registration::where('email', $email)->first();

            if (!$user) {
                return response()->json([
                    'fail_notification' => 'This email account is invalid',
                ]);
            }

            if ($user->account_status == 1) {
                return response()->json([
                    'fail_notification' => 'This account has already been verified',
                ]);
            }

            $p_number = $user->p_number;
            $full_name = $user->f_name;

            $rec_prefix = $this->utilsHelper->recovery_prefix(4);
            $verification_id = rand(111111, 999999);

            // Send email and SMS logic
            $mailHtml = "
            <span ><img src='cid:logo' ></span>
            <p>
            Ndugu $full_name, <br/><br/>
            Nenosiri lako la muda mfupi (OTP) kiambishi awali ni : <span style='color: blue;font-weight: bold;'>$rec_prefix </span> na msimbo wa kuweka upya ni :<span style='color: blue; font-weight: bold; '>$verification_id</span>.  Tafadhali kumbuka kuwa OTP hii inaisha ndani ya dakika 3 baada ya uzalishaji wake. Ikiwa hukuanzisha ombi hili, tafadhali wasiliana nasi kupitia +255 736 836 936 kwa usaidizi zaidi. <br/><br/>

            Tunakushukuru kwa kuendelea kutuunga mkono katika yote tunayofanya. Jisikie huru kututumia maoni kuhusu uzoefu wako wakati unajivinjari kupitia jukwaa letu. <br/><br/>

            Kwa heshima kubwa, <br/>
            The C.A.R.D. Informatics Team!
            </p>

            <br/><br/><br/>

            <p>
            Dear $full_name,<br/><br/>
            Your One-Time Password (OTP) reference prefix is: <span style='color: blue;
            font-weight: bold;'> $rec_prefix</span> and the reset code is :<span style='color: blue; font-weight: bold;'>$verification_id</span>. Please note that this OTP expires within 3 minutes of its generation. In case you did not initiate this request, please contact us at +255 736 836 936 for further assistance.<br/><br/>

            Thank you for your continued support in all we do. Feel free to send us feedback regarding your experience while browsing through our platform.<br/><br/>

            With regards,<br/>
            The C.A.R.D. Informatics Team!<br/><br/><br/><br/><br/><br/><br/><br/>

            <span style='color: gray;'> <i>
            Nb.  This email has been auto-generated, please do not respond to the sender. Any information contained herein, including links or attachments, is confidential! It is intended solely for the addressee, and may also be privileged or exempt from disclosure under applicable law. If you are not the addressee, or have received this e-mail in error, please notify the sender immediately, delete it from your system and do not copy, disclose or otherwise act upon any part of this e-mail or its contents. Internet communications are not guaranteed to be secure or virus-free. We do not accept responsibility for any loss from the transmission of any malware that has arisen from unauthorized access or from interference of any internet communications by any third party.
                </span></i>
            </span></i>
            </p>";

            $smsHtml = "Ndugu $full_name,
    Nenosiri lako la muda mfupi (OTP) imetumwa kwa barua pepe yako ($email) OTP hii inaisha ndani ya dakika 3.

    Dear $full_name,
    Your One-Time Password (OTP) has been sent to your registered email ($email), OTP expires within 3 mins.";

            $this->utilsHelper->send_email($email, "Account Verification", $mailHtml);
            $this->utilsHelper->message_send($p_number, $smsHtml);

            $response = [
                'success_notification' => [
                    'Verification_send' => $verification_id,
                    'rec_prefix' => $rec_prefix,
                    'email' => $email,
                    'start' => time(),
                    'expire' => time() + (60 * 5),
                    'success_notification' => 'Please check your Mobile Phone or Email for one-time passcode! Be sure to check your spam mailbox if the message is not in your inbox.',
                ],
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'fail_notification' => 'Failed, to request otp\n' . $e,
            ]);
        }
    }
}
