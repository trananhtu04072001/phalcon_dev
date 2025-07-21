<?php

namespace App\Jobs;

use Phalcon\Di\Injectable;

class SendResetPasswordJob extends Injectable
{
    public function handle($payload) {
        $email = $payload['email'];
        $link  = $payload['reset_link'];
        $mailer = $this->di->get('mailer');
        $mailer->addAddress($email , 'Email reset password');
        $mailer->Subject = "Reset your password";
        $mailer->Body    = "Click vào link để đặt lại mật khẩu: <a href='$link'>$link</a>";
        $mailer->send();
    }
}
