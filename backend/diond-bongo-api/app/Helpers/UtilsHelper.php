<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UtilsHelper
{
    public function log($message){
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln($message);
    }

    public function send_email($to, $subject, $msg)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "mail.cardinformatics.co.tz";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "noreply_digitalsolutions@cardinformatics.co.tz";
        $mail->Password = "DBbongo@1020";
        $mail->SetFrom("noreply_digitalsolutions@cardinformatics.co.tz");
        $mail->addAddress($to);
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->addEmbeddedImage(dirname(dirname(dirname(__FILE__))) . '/storage/app/public/profile_pictures/1avatar1.jpg', 'logo');
        if (!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function message_send($p_number, $smsHtml)
    {

        $sms = array(
            'from' => 'CARD Info',
            'to' => $p_number,
            'text' => $smsHtml,
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => 'https://messaging-service.co.tz/api/sms/v1/text/single',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($sms),

            CURLOPT_HTTPHEADER => array(

                'Authorization: Basic Y2FyZGluZm9ybWF0aWNzOkNBUkRJbmZvcm1hdGljc3NtczE=',
                'Content-Type: application/json',
                'Accept: application/json',

            ),

        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function message_send_catch($p_number, $smsHtml_catch)
    {

        $sms = array(
            'from' => 'CARD Info',
            'to' => $p_number,
            'text' => $smsHtml_catch,
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => 'https://messaging-service.co.tz/api/sms/v1/text/single',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($sms),

            CURLOPT_HTTPHEADER => array(

                'Authorization: Basic Y2FyZGluZm9ybWF0aWNzOkNBUkRJbmZvcm1hdGljc3NtczE=',
                'Content-Type: application/json',
                'Accept: application/json',

            ),

        ));

        $response = curl_exec($curl);
        curl_close($curl);
        //echo $response;
    }

    public function getIpAddr()
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

    public function recovery_prefix($prefix_number)
    {
        $character = 'ABCDEFGHIJKLMNOPXRSTUVWXYZ';

        $random_char = '';

        for ($i = 0; $i < $prefix_number; $i++) {
            $index = rand(0, strlen($character) - 1);
            $random_char .=  $character[$index];
        }

        return $random_char;
    }
}
