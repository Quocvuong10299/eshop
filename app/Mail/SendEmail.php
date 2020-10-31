<?php


namespace App\Mail;


use Illuminate\Support\Facades\Mail;

class SendEmail
{
    public function __construct()
    {

    }

    public function signUp($information)
    {
        $details = [
            'title' => 'Xác nhận email',
            'fullName' => $information['fullName'],
            'token' => $information['token'],
        ];

        Mail::to($information['email'])->send(new Email($details, 'Xác nhận tài khoản', 'email.sign-up'));

        return "Email sent";
    }

    public function resetPassword($information)
    {
        $details = [
            'title' => 'Đặt lại mật khẩu',
            'email' => $information['email'],
            'token' => $information['token'],
        ];

        Mail::to($information['email'])->send(new Email($details, 'Đặt lại mật khẩu', 'email.reset-password'));

        return "Email sent";
    }
}
