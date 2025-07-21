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
        $mailer->Body    = "Email: '$email'<br> Password: '$password'";
        $mailer->send();
    }
}
