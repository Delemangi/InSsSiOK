<?php
const SITE_NAME = 'ISOK';
const DOCTYPE = 'xhtml strict';

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

$page = new Page('Cookie and Session Example');
$page->description('Using Cookie and Session Wrappers');
$page->keywords('cookie, session, wrapper');
$page->robots(true);
$page->link('css/style.css');
$page->jquery('$(document).ready(function(){ alert("Page with Cookie and Session Wrapper jQuery"); });');
$page->body('style="background-color: #f0f0f0;"');

CookieWrapper::set('user', 'john_doe', time() + 3600);
$cookieValue = CookieWrapper::get('user');
echo "Cookie Value: $cookieValue<br>";

SessionWrapper::start();
SessionWrapper::set('user', 'john_doe');
$sessionValue = SessionWrapper::get('user');
echo "Session Value: $sessionValue<br>";

$content = '
    <h1>Page with Cookie and Session Wrapper</h1>
    <p>Check the console for cookie and session values.</p>
';

echo $page->display($content);
