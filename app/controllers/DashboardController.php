<?php

use App\Models\Users;

class DashboardController extends ControllerBase
{
    public function indexAction()
    {
        $userLogged = $this->userLogged;
        $users = Users::find("role = 'user'");
        $this->view->setVars(['userLogged' => $userLogged, 'users' => $users]);  
    }

    public function updateProfileAction() {
        $userLogged = $this->userLogged;
        $this->view->setVar('userLogged', $userLogged);  
    }
}
