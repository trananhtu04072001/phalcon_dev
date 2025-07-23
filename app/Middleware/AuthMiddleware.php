<?php

namespace App\Middleware;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use App\Enums\UserRole;

class AuthMiddleware extends Plugin
{
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher) {
        $controller = strtolower($dispatcher->getControllerName());
        $action     = strtolower($dispatcher->getActionName());
        $publicRoutes = [
            'auth' => ['login', 'register', 'resetpassword', 'forgotpassword'],
        ];
        if (isset($publicRoutes[$controller]) && in_array($action, $publicRoutes[$controller])) {
            return true;
        }
        if (!$this->session->has('user')) {
            $this->response->redirect('auth/login')->send();
            return false;
        } else {
            if ($this->session->get('user')['role'] == UserRole::ADMIN && 
                is_null($this->session->get('user')['deleted_at'])) {
                return true;
            }
        }
        return true;
    }
}