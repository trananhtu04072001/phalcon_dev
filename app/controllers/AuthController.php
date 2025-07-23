<?php

class AuthController extends ControllerBase
{
    public function loginAction()
    {
        if ($this->request->getPost()) {
            $result = $this->authService->login($this->request->getPost());
            return $this->response
                ->setStatusCode($result['success'] ? 201 : 422)
                ->setJsonContent($result);
        }
    }

    public function registerAction() {
        if ($this->request->getPost()) {
            $result = $this->authService->register($this->request->getPost());
                return $this->response
                ->setStatusCode($result['success'] ? 201 : 422)
                ->setJsonContent($result);
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
        $data = $this->request->getPost();
        if ($data) {
            $result = $this->authService->resetPassword($token, $data);
        }
        $this->view->setVar('token', $token);  
    }
}

