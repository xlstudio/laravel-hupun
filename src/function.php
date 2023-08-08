<?php

if (!function_exists('hupun')) {
    function hupun($ApiType) {
        if ($ApiType == 'b2c') {
            return app('hupun');
        } elseif ($ApiType == 'open') {
            return app('hupunOpen');
        } else {
            throw new Exception('hupun api type error');
        }

    }
}
