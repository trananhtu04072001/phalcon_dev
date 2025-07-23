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
                ->setStatusCode($result['success'] ? 200 : 422)
                ->setJsonContent($result);
        }
    }

    public function deleteAction($id) {
        if ($id) {
            $this->userService->softDelete($id);
            $this->flashSession->success('Xoá thành công!');
            return $this->response->redirect('dashboard/index');
        }
    }

    public function restoreAction($id) {
        if ($id) {
            $this->userService->restore($id);
            $this->flashSession->success('Khôi phục thành công!');
            return $this->response->redirect('dashboard/index');
        }
    }
}

