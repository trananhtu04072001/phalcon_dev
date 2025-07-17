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
}

