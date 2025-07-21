<?php

use App\Models\Users;

class DashboardController extends ControllerBase
{
    public function indexAction()
    {
        $userLogged = $this->userLogged;
        $keyword = $this->request->get('keyword');
        $users = $this->userService->filterSearch($keyword);
        $this->view->setVars(['userLogged' => $userLogged, 'users' => $users]);  
    }

    public function updateProfileAction() {
        $userLogged = $this->userLogged;
        if ($this->request->getPost()) {
            $reqFile = $this->request->getUploadedFiles();
            $result = $this->userService->updateProfile($userLogged['id'], $this->request->getPost(), $reqFile);
        }
        $this->view->setVar('userLogged', $userLogged);  
    }
}
