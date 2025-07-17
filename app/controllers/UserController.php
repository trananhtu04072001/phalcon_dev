<?php

class UserController extends ControllerBase
{

    public function createAction()
    {
        if ($this->request->getPost()) {
            $result = $this->userService->create($this->request->getPost());
        }
    }

}

