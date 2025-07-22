<?php

namespace App\Jobs;

use Phalcon\Di\Injectable;

class AutoResetPasswordJob extends Injectable
{
    public function handle($payload) {
        $email = $payload['email'];
        $password  = $payload['password'];
        $mailer = $this->di->get('mailer');
        $mailer->addAddress($email , 'Email new password notification');
        $mailer->Subject = "Email new password notification";
        $mailer->Body = "
            <span>Thông tin tài khoản đăng nhập</span><br>
            Email: {$email}<br> 
            Password: {$password}
        ";
        $mailer->send();
    }
}
