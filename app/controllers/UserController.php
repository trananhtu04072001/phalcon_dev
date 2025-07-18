<?php

class UserController extends ControllerBase
{

    public function createAction()
    {
        if ($this->request->getPost()) {
            $reqFile = $this->request->getUploadedFiles();
            $result = $this->userService->create($this->request->getPost(), $reqFile);
            return $this->response
                ->setStatusCode($result['success'] ? 201 : 422)
                ->setJsonContent($result);
        }
    }

    public function updateAction($id) {
        if ($this->request->getPost()) {
            $reqFile = $this->request->getUploadedFiles();
            $result = $this->userService->update($id, $this->request->getPost(), $reqFile);
            return $this->response
                ->setStatusCode($result['success'] ? 201 : 422)
                ->setJsonContent($result);
        }
    }

}

