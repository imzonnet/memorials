<?php
use Illuminate\Support\Facades\Auth;

/**
 * Get the information whether the current section is backend, admin or public
 * @return array
 */
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

/**
 * Current User
 * @return object
 */
function current_user()
{
    if (Auth::check()) {
        return Auth::user();
    }
    return NULL;
}

/**
 * Check Backend Permission
 * @return boolean
 */
function is_admin()
{
    if (Auth::check() and Auth::user()->group === 'admin') {
        return true;
    }
    return false;
}

/**
 * Check User Permission
 * @return boolean
 */
function is_user()
{
    if (Auth::check() and Auth::user()->group === 'member') {
        return true;
    }
    return false;
}
