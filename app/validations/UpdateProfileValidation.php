<?php

namespace App\Validations;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Uniqueness;
use App\Models\Users;

class UpdateProfileValidation extends Validation
{
    protected $currentUserId;

    public function __construct($currentUserId)
    {
        $this->currentUserId = $currentUserId;

        parent::__construct();
    }

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
            'except'  => [
                'id' => $this->currentUserId,
            ],
        ]));
    }
}
