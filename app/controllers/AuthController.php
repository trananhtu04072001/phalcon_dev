<?php

class AuthController extends ControllerBase
{
    public function loginAction()
    {
        if ($this->request->getPost()) {
            $result = $this->authService->login($this->request->getPost());
        }
    }

    public function registerAction() {
        if ($this->request->getPost()) {
            $result = $this->authService->register($this->request->getPost());
        }
    }

    public function logoutAction() {
        $this->session->remove('user');
        $this->flashSession->success('Bạn đã đăng xuất.');
        return $this->response->redirect('auth/login');
    }

    public function forgotPasswordAction() {
        $email = $this->request->getPost('email');
        if ($email) {
            $result = $this->authService->forgotPassword($email);
        }
    }

    public function resetPasswordAction($token) {
        $password = $this->request->getPost('password');
        if ($password) {
            $result = $this->authService->resetPassword($token, $password);
        }
        $this->view->setVar('token', $token);  
    }
}

