<?php

if (!function_exists('back_url')) {
    function back_url()
    {
        return session()->has('back_url')
            ? session('back_url')
            : null;
    }
}

if (!function_exists('redirect_back')) {
    function redirect_back($routeName)
    {
        return back_url()
            ? redirect(back_url())
            : redirect()->route($routeName);
    }
}
