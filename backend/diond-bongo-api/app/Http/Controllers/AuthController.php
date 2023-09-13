<?php

namespace App\Http\Controllers;

use App\Models\Loginlog;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function handleLogin(Request $request)
    {
        $ip_address = $this->getIpAddr();
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
            $user = Registration::join('role', 'role.role_id', '=', 'registration.role')
                ->where('email', $username)
                ->orWhere('p_number', $username)
                ->first();

            if ($user) {
                if ($user->status == 0) {
                    if ($user->account_status == 1) {
                        // Check password and perform actions
                        if (md5($password) == $user->password) {
                            if ($user->role == 2) {
                                Loginlog::where('IpAddress', $ip_address)->delete();
                                // Handle success for role 2
                                return response()->json([
                                    'success_notification' => array_merge(
                                        ['user_id_prefix' => 'CI' . date('my')],
                                        $user->toArray()
                                    ),
                                ], 200);
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
                // Handle invalid account
                return response()->json([
                    'fail_notification' => 'Invalid Account',
                ], 400);
            }
        }
    }

    private function getIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ipAddr = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddr;
    }

    private function sendEmailAndSMS(String $email, String $f_name, String $p_number)
    {

    }

    private function lockAccount($email)
    {
        $ip_address = $this->getIpAddr();
        $locking_cz = 'Trying password three times';
        $Adm_email = 'Auto Locked';
        $locked_date = date('d/m/Y H:i');
        $temp_expiry = mktime(0, 0, 0, date("m"), date("d") + 100, date("Y"));
        $locked_date1 = date('Y-m-d', $temp_expiry);

        DB::table('loginlogs')->where('IpAddress', $ip_address)->delete();

        DB::table('registration')
            ->where('email', $email)
            ->update([
                'status' => 1,
                'locking_cz' => $locking_cz,
                'Adm_email' => $Adm_email,
                'locked_date' => $locked_date,
                'locked_date1' => $locked_date1,
            ]);
    }
}
