<?php

namespace App\Services;

use Phalcon\Di\Injectable;
use App\Models\Users;
use App\Validations\CreateUserValidation;
use App\Validations\UpdateUserValidation;

class UserService extends Injectable {
    public function create($data, $reqFile) {
        $validator = new CreateUserValidation();
        $messages  = $validator->validate($data);
        if (count($messages)) {
            $errors = [];
            foreach ($messages  as $msg) {
                $field = $msg->getField();
                $errors[$field] = $msg->getMessage();
            }
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        if (!empty($data) && !empty($reqFile)) {
            $user = new Users();
            $user->name = $data['name'] ?? '';
            $user->full_name = $data['full_name'] ?? '';
            $user->email = $data['email'] ?? '';    
            $user->phone = $data['phone'] ?? '';
            $user->avatar = $this->helpers->upload($reqFile['0'], 'avatar') ?? '/images/default-avatar.png';
            $passwordPlain = bin2hex(random_bytes(4));
            $user->password = $this->security->hash($passwordPlain) ?? '';
            $user->role = $data['role'] ?? UserRole::USER;
            if ($user->save()) {
                return [
                    'success' => true,
                    'message' => 'Tạo user thành công!'
                ];
            }
        }
    }

    public function update($id, $data, $reqFile) {
        $validator = new UpdateUserValidation();
        $messages  = $validator->validate($data);
        if (count($messages)) {
            $errors = [];
            foreach ($messages  as $msg) {
                $field = $msg->getField();
                $errors[$field] = $msg->getMessage();
            }
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        if (!empty($data)) {
            $user = Users::findFirstById($id ?? null);
            $user->name = $data['name'] ?? '';
            $user->full_name = $data['full_name'] ?? '';
            $user->email = $data['email'] ?? '';
            if (!empty($reqFile)) {
                $user->avatar = $this->helpers->upload($reqFile['0'], 'avatar');
            } 
            $passwordPlain = bin2hex(random_bytes(4));
            $user->password = $this->security->hash($passwordPlain) ?? '';
            $user->role = $data['role'] ?? UserRole::USER;
            if ($user->save()) {
                return [
                    'success' => true,
                    'message' => 'Cập nhật thành công!'
                ];
            }
        }
    }
}