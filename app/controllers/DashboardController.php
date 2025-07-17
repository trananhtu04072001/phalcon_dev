<?php

class DashboardController extends ControllerBase
{
    public function indexAction()
    {
        $userLogged = $this->userLogged;
        $this->view->setVar('userLogged', $userLogged);  
    }
}
