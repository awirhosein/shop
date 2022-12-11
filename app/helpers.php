<?php

if (!function_exists('back_url')) {
    function back_url()
    {
        return session()->has('back_url')
            ? session('back_url')
            : null;
    }
}