<?php

namespace App\Services;

use Phalcon\Di\Injectable;
use App\Models\Users;

class UserService extends Injectable {
    public function create($data, $reqFile) {
        // $validator = new RegisterValidation();
        // $errors = $validator->validate($data);
        // if (count($errors)) {
        //     foreach ($errors as $msg) {
        //         $this->flashSession->error($msg);
        //     }
        //     return ['success' => false, 'errors' => $errors];
        // }
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
                $this->flashSession->success('Tạo user thành công!');
                return $this->response->redirect('auth/register');
            }
        }
    }
}