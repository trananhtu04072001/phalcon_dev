<?php

namespace App\Helpers;

class Helper {
    public static function dd($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;    
    }
}