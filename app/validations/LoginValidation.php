<?php

namespace App\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use App\Models\Users;

class LoginValidation extends Validation {
    public function initialize()
    {
        $this->add('email', new PresenceOf([
            'message' => 'Email không được để trống.',
        ]));
        $this->add('email', new Email([
            'message' => 'Email không đúng định dạng.',
        ]));
        $this->add('password', new PresenceOf([
            'message' => 'Mật khẩu không được để trống.',
        ]));
        $this->add('password', new StringLength([
            'min' => 6,
            'max' => 20,
            'messageMinimum' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'messageMaximum' => 'Mật khẩu không được vượt quá 20 ký tự.',
        ]));
    }
}