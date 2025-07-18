<?php

namespace App\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Confirmation;

class UpdateUserValidation extends Validation
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
        // $this->add('phone', new PresenceOf([
        //     'message'      => 'Yêu cầu nhập số điện thoại.',
        // ]));
        // $this->add('phone', new StringLength([
        //     'min' => 10,
        //     'message' => 'Yêu cầu nhập tối thiểu 10 số.',
        // ]));
        $this->add('role', new PresenceOf([
            'message' => 'Quyền không được để trống.',
        ]));
    }
}
