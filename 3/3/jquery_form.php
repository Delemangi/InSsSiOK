<?php

include 'page.php';

$page = new Page('Login Page');
$page->description('Login');
$page->keywords('login, authentication, website');
$page->robots(true);
$page->body('style="background-color: #f0f0f0;"');

$output = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username)) {
        $output .= "<p class='output'>Please enter your username.</p>";
    }

    if (empty($password)) {
        $output .= "<p class='output'>Please enter your password.</p>";
    }

    if (!empty($username) && !empty($password)) {
        if ($username == 'admin' && $password == 'password') {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['logged_in'] = true;
            $output .= "<p class='output'>You have successfully logged in as $username.</p>";
        } else {
            $output .= "<p class='output'>Invalid username or password.</p>";
        }
    }
}

$content = '
    <h1>Login to Your Website</h1>
    ' . $output . '
    <form action="" method="post" id="login-form" novalidate="novalidate">
        <div class="label">Username</div><input type="text" id="username" name="username" /><br />
        <div class="label">Password</div><input type="password" id="password" name="password" /><br />
        <div style="margin-left:140px;"><input type="submit" name="submit" value="Login" /></div>
    </form>
';

echo $page->display($content);
