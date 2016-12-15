<?php

if (!function_exists('is_control')) {

    function is_control()
    {
        return starts_with(
            request()->path(),
            trim(env('APP_CONTROL_PREFIX', 'control'), '\\')
        );
    }

}

