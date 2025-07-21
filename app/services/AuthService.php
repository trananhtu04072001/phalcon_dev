<?php

namespace App\Services;

use Phalcon\Di\Injectable;
use App\Models\Users;
use App\Validations\RegisterValidation;
use App\Validations\LoginValidation;
use App\Enums\UserRole;
use App\Models\QueueJobs;

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
        $user->avatar = '/default/default-avatar.png';
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
                $job = new QueueJobs();
                $job->type = 'send_reset_password';
                $job->payload = json_encode(['email' => $email, 'reset_link' => $resetLink]);
                $job->status = 'pending';
                $job->save();
            } else {
                $this->flashSession->error('Email không tồn tại.');
            }
        }
    }

    public function resetPassword($token, $password) {
        $now = date('Y-m-d H:i:s');
        $user = Users::findFirst([
            'conditions' => 'reset_token = ?1 AND reset_token_expire > :now:',
            'bind' => [
                'token' => $token,
                'now' => $now
            ]
        ]);
        if (!$user) {
            $this->flashSession->error('Token không hợp lệ hoặc hết hạn');
        }
        $this->helpers->dd($now);
        if ($password) {
            $user->password = $this->security->hash($password);
            $user->reset_token = null;
            $user->reset_token_expire = null;
            $user->save();
            $this->flashSession->success('Đặt lại mật khẩu thành công');
            return $this->response->redirect('auth/login');
        }
    }
}