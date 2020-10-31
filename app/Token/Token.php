<?php


namespace App\Token;


use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class Token
{
    private $time;


    public function __construct()
    {
        $this->time = 10;
    }

    public function generateToken($user_id, $type)
    {
        $information = [
            'userID' => $user_id,
            'date' => Carbon::now(),
            'secret' => env('APP_SECRET_KEY'),
            'type' => $type,
        ];


        $information = json_encode($information);

        $token = Crypt::encryptString($information);

        return $token;
    }

    public function decryptToken($token)
    {
        $information = Crypt::decryptString($token);
        $information = json_decode($information, true);

        return $information;
    }

    public function verifyToken($token)
    {

        $information = $this->decryptToken($token);


        $time = $information['date'];
        $key = $information['secret'];
        $type = $information['type'];


        if (!$this->verifySecretKeyToken($key))
//            return __('token.verify_token_failed');
            return false;

        if (!$this->verifyTypeToken($type))
//            return __('token.verify_token_failed');
            return false;

        if (!$this->verifyTimeToken($time))
//            return __('verify_token_failed_time');
            return false;


        return true;


    }

    private function verifySecretKeyToken($key)
    {
        return $key == env('APP_SECRET_KEY');
    }

    private function verifyTypeToken($type)
    {
        return $type == __('token.verify_email') || $type == __('token.forgot_password');
    }

    private function verifyTimeToken($time)
    {
        $time = Carbon::parse($time);
        $time = $time->addMinutes($this->time);
        $now = Carbon::now();

        return $time->greaterThan($now);
    }

    public function generateTokenForgotPassword($email, $type)
    {
        $information = [
            'email' => $email,
            'date' => Carbon::now(),
            'secret' => env('APP_SECRET_KEY'),
            'type' => $type,
        ];

        $information = json_encode($information);

        $token = Crypt::encryptString($information);

        return $token;
    }


}
