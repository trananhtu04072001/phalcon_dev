<?php

class UserController extends ControllerBase
{

    public function createAction()
    {
        if ($this->request->getPost()) {
            $reqFile = $this->request->getUploadedFiles();
            $result = $this->userService->create($this->request->getPost(), $reqFile);
        }
    }

}

