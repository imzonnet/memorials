<?php
use Illuminate\Support\Facades\Auth;

/**
 * Get the information whether the current section is backend, admin or public
 * @return array
 */
if (!function_exists('current_section')) {
    function current_section()
    {
        if (Request::is('backend*') || Request::is('admin*')) {
            $link_type = 'backend';
            $theme = !is_null(env('THEME_BACKEND')) ? env('THEME_BACKEND') : 'default';
        } else {
            $link_type = 'frontend';
            $theme = !is_null(env('THEME_FRONTEND')) ? env('THEME_FRONTEND') : 'default';
        }
        return array($link_type, $theme);
    }
}
/**
 * Current User
 * @return object
 */
if (!function_exists('current_user')) {
    function current_user()
    {
        if (Auth::check()) {
            return Auth::user();
        }
        return NULL;
    }
}

/**
 * Check Backend Permission
 * @return boolean
 */
if (!function_exists('is_admin')) {
    function is_admin()
    {
        if (Auth::check() and Auth::user()->group === 'admin') {
            return true;
        }
        return false;
    }
}

/**
 * Check User Permission
 * @return boolean
 */
if (!function_exists('is_user')) {
    function is_user()
    {
        if (Auth::check() and Auth::user()->group === 'member') {
            return true;
        }
        return false;
    }
}

/**
 * Convert state
 * @param int
 * @return string
 */
if( !function_exists('sate_convert')) {
    function sate_convert($state) {
        switch($state) {
            case 1:
                return "Publish"; break;
            default :
                return "UnPublish"; breal;
        }
    }
}