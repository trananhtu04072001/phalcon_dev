<?php

namespace App\Services;

use Phalcon\Di\Injectable;
use App\Models\Users;
use App\Validations\RegisterValidation;
use App\Validations\LoginValidation;
use App\Enums\UserRole;

class AuthService extends Injectable {
    public function register($data) {
        $validator = new RegisterValidation();
        $errors = $validator->validate($data);
        if (count($errors)) {
            foreach ($errors as $msg) {
                $this->flashSession->error($msg);
            }
            return ['success' => false, 'errors' => $errors];
        }
        $user = new Users();
        $user->name = $data['name'] ?? '';
        $user->full_name = $data['full_name'] ?? '';
        $user->email = $data['email'] ?? '';    
        $user->phone = $data['phone'] ?? '';
        $user->avatar = '/images/default-avatar.png';
        $user->password = $this->security->hash($data['password']) ?? '';
        $user->role = UserRole::ADMIN;
        if ($user->save()) {
            $this->flashSession->success('Đăng ký thành công!');
            return $this->response->redirect('auth/register');
        }
    }

    public function login($data) {
        $validator = new LoginValidation();
        $errors = $validator->validate($data);
        if (count($errors)) {
            foreach ($errors as $msg) {
                $this->flashSession->error($msg);
            }
            return ['success' => false, 'errors' => $errors];
        }
        $user = Users::findFirstByEmail($data['email']);
        if (!$user || !$this->security->checkHash($data['password'], $user->password)) {
            $this->flashSession->error('Thông tin đăng nhập không chính xác.');
        }
        // Đăng nhập thành công
        $this->session->set('user', $user->toArray());
        return $this->response->redirect('dashboard');
    }
}