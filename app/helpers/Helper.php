<?php

namespace App\Helpers;

use Phalcon\Http\Request\File;
use App\Models\QueueJobs;

class Helper {
    public static function dd($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;    
    }

    public static function upload(File $file, string $folder) {
        if (!$file->getName()) {
            return null;
        }
        $basePath = 'public/' . $folder . '/';
        if (!is_dir($basePath)) {
            mkdir($basePath, 0777, true);
        }
        $extension = strtolower(pathinfo($file->getName(), PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($extension, $allowedTypes)) {
            return null;
        }
        $filename = uniqid() . '.' . $extension;
        $fullPath = $basePath . $filename;

        if ($file->moveTo($fullPath)) {
            return $folder . '/' . $filename;
        }
        return null;
    }

    public function deleteImage($filename, $folder = 'avatar/') {
        $filePath = 'public/' . $folder . $filename;
        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }


    public function queueJobs(string $type, array $payload) {
        $job = new QueueJobs();
        $job->type = $type;
        $job->payload = json_encode($payload);
        $job->status = 'pending';
        $job->save();
    }
}