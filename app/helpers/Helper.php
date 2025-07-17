<?php

namespace App\Helpers;

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
}