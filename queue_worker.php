<?php
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app'); 

// Load .env
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Khởi tạo DI
$di = new \Phalcon\Di\FactoryDefault();
$application = new \Phalcon\Mvc\Application($di);   
$config = include APP_PATH . '/config/config.php';

require APP_PATH . '/config/loader.php';
require APP_PATH . '/config/services.php';

use App\Jobs\SendResetPasswordJob;
use App\Models\QueueJobs;

// Vòng lặp xử lý queue
while (true) {
    $job = QueueJobs::findFirst([
        'conditions' => 'status = "pending"',
        'order'      => 'id ASC'
    ]);

    if (!$job) {
        sleep(1);
        continue;
    }

    $job->status = 'processing';
    $job->save();

    $payload = json_decode($job->payload, true);

    try {
        if ($job->type === 'send_reset_password') {
            (new SendResetPasswordJob())->handle($payload);
        }

        $job->status = 'done';
        $job->save();
    } catch (Exception $e) {
        $job->status = 'failed';
        $job->save();
        error_log("Queue job failed: " . $e->getMessage());
    }
}
