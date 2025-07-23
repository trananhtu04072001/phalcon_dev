<?php

namespace App\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;

class ResetPasswordValidation extends Validation
{
    public function initialize()
    {
        $this->add('password', new PresenceOf([
            'message' => 'Mật khẩu không được để trống.',
        ]));
        $this->add('password', new StringLength([
            'min' => 6,
            'max' => 20,
            'messageMinimum' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'messageMaximum' => 'Mật khẩu không được vượt quá 20 ký tự.',
        ]));
        $this->add('confirm_password', new Confirmation([
                'message'      => 'Mật khẩu xác nhận không khớp.',
                'with'         => 'password', // trường để so sánh
            ])
        );
    }
}
