<?php

include 'page.php';
include 'wrappers.php';

class PageWithCookies extends Page
{
    public function setCookie($name, $value, $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        CookieWrapper::set($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    public function getCookie($name)
    {
        return CookieWrapper::get($name);
    }

    public function deleteCookie($name)
    {
        CookieWrapper::delete($name);
    }

    public function startSession()
    {
        SessionWrapper::start();
    }

    public function setSession($name, $value)
    {
        SessionWrapper::set($name, $value);
    }

    public function getSession($name)
    {
        return SessionWrapper::get($name);
    }

    public function deleteSession($name)
    {
        SessionWrapper::delete($name);
    }

    public function destroySession()
    {
        SessionWrapper::destroy();
    }
}

$page = new PageWithCookies('Page With Cookies');
$page->description('Cookies');
$page->keywords('cookie, session, wrapper, integration');
$page->robots(true);
$page->link('https://code.jquery.com/jquery-1.9.1.js');
$page->link('https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js');
$page->jquery('$(document).ready(function(){ alert("Hello"); });');
$page->body('
    <h1>Page With Cookies</h1>
');

$page->setCookie('user', 'john_doe', time() + 3600);
$cookieValue = $page->getCookie('user');

$page->startSession();
$page->setSession('user', 'user');
$sessionValue = $page->getSession('user');

echo $page->display("<br> Cookie Value: $cookieValue <br> Session Value: $sessionValue <br>");
