<?php

namespace App\Services;

use Phalcon\Di\Injectable;
use App\Models\Users;
use App\Validations\RegisterValidation;
use App\Validations\LoginValidation;
use App\Validations\ResetPasswordValidation;
use App\Enums\UserRole;

class AuthService extends Injectable {
    public function register($data) {   
        $validator = new RegisterValidation();
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
        $user = new Users();
        $user->name = $data['name'] ?? '';
        $user->full_name = $data['full_name'] ?? '';
        $user->email = $data['email'] ?? '';    
        $user->phone = $data['phone'] ?? '';
        $user->avatar = 'default/default-avatar.png';
        $user->password = $this->security->hash(trim($data['password'])) ?? '';
        $user->role = UserRole::ADMIN;
        if ($user->save()) {
            return ['success' => true, 'message' => 'Đăng ký thành công!', 'redirect' => '/auth/login'];
        }
    }

    public function login($data) {
        $validator = new LoginValidation();
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
        $user = Users::findFirstByEmail($data['email']);
        if (!$user || !$this->security->checkHash(trim($data['password']), $user->password)) {
            return [
                'success' => false,
                'message' => 'Thông tin đăng nhập không chính xác.'
            ];
        }
        // Đăng nhập thành công
        $this->session->set('user', $user->toArray());
        return ['success' => true, 'message' => 'Đăng nhập thành công!', 'redirect' => '/dashboard'];
    }

    public function forgotPassword($email) {
        if ($email) {   
            $user = Users::findFirstByEmail($email);
            if ($user) {
                $token = bin2hex(random_bytes(32));
                $user->reset_token = $token;
                $user->reset_token_expire = date('Y-m-d H:i:s', strtotime('+1 hour'));
                $user->save();
                $resetLink = $this->url->get($_ENV['DOMAIN']."auth/resetPassword/$token", true);
                // Push job vào queue
                $this->helpers->queueJobs('send_reset_password', ['email' => $email, 'reset_link' => $resetLink]);
            } else {
                $this->flashSession->error('Email không tồn tại.');
            }
        }
    }

    public function resetPassword($token, $data) {
        $validator = new ResetPasswordValidation();
        $errors = $validator->validate($data);
        if (count($errors)) {
            foreach ($errors as $msg) {
                $this->flashSession->error($msg);
            }
            return ['success' => false, 'errors' => $errors];
        }
        $now = date('Y-m-d H:i:s');
        $user = Users::findFirst([
            'conditions' => 'reset_token = :token: AND reset_token_expire > :now:',
            'bind' => [
                'token' => $token,
                'now' => $now
            ]
        ]);
        if (!$user) {
            $this->flashSession->error('Token không hợp lệ hoặc hết hạn');
        }
        if ($data['password']) {
            $user->password = $this->security->hash($data['password']);
            $user->reset_token = null;
            $user->reset_token_expire = null;
            $user->save();
            $this->flashSession->success('Đặt lại mật khẩu thành công');
            return $this->response->redirect('auth/login');
        }
    }
}