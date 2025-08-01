<?php

namespace App\Jobs;

use Phalcon\Di\Injectable;

class CreateNewUserJob extends Injectable
{
    public function handle($payload) {
        $email = $payload['email'];
        $password  = $payload['password'];
        $mailer = $this->di->get('mailer');
        $mailer->addAddress($email , 'Email new account notification');
        $mailer->Subject = "Email new account notification";
        $mailer->Body = "
            <span>Thông tin tài khoản đăng nhập</span><br>
            Email: {$email}<br> 
            Password: {$password}
        ";
        $mailer->send();
    }
}
