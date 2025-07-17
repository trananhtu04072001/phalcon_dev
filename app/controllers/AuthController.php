<?php

class AuthController extends ControllerBase
{
    public function loginAction()
    {
        echo 'Trang dang nhap';
    }

    public function registerAction() {
        if ($this->request->getPost()) {
            $result = $this->authService->register($this->request->getPost());
        }
    }
}

