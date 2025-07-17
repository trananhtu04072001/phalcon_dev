<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Services\AuthService;

$auth = new AuthService();
echo "OK";
