<?php

class CookieWrapper
{
    public static function set($name, $value, $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    public static function get($name)
    {
        return $_COOKIE[$name] ?? null;
    }

    public static function delete($name)
    {
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
            setcookie($name, '', time() - 3600, '/');
        }
    }
}

class SessionWrapper
{
    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        return $_SESSION[$name] ?? null;
    }

    public static function delete($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public static function destroy(): void
    {
        session_destroy();
    }
}
