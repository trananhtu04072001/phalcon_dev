<?php

namespace App\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Uniqueness;
use App\Models\Users;

class RegisterValidation extends Validation
{
    public function initialize()
    {
        $this->add('name', new PresenceOf([
            'message' => 'Tên không được để trống.',
        ]));
        $this->add('full_name', new PresenceOf([
            'message' => 'Tên đầy đủ không được để trống.',
        ]));
        $this->add('email', new PresenceOf([
            'message' => 'Email không được để trống.',
        ]));

        $this->add('email', new Email([
            'message' => 'Email không đúng định dạng.',
        ]));
        $this->add('email', new Uniqueness([
            'model'   => new Users(),
            'message' => 'Email đã được đăng kí.',
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
        $this->add('confirm_password', new Confirmation([
                'message'      => 'Mật khẩu xác nhận không khớp.',
                'with'         => 'password', // trường để so sánh
            ])
        );
    }
}
