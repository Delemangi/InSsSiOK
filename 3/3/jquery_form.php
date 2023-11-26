<?php

include 'page.php';

$page = new Page('Login Page');
$page->doctype('xhtml strict');
$page->access('all');
$page->title('Login Page');
$page->description('Login Page');
$page->keywords('isok, login');
$page->robots(true);
$page->charset('utf-8');
$page->jquery('$(function() {
            $("#register-form").validate({
                rules: {
                    name: "required",
                    gender: "required",
                    address: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    username: "required",
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    name: "Please enter your name",
                    gender: "Please specify your gender",
                    address: "Please enter your address",
                    email: "Please enter a valid email address",
                    username: "Please enter a valid username",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });'
);
$page->link('https://code.jquery.com/jquery-1.9.1.js');
$page->link('https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js');
$page->body('
<h1>Login</h1>
    <form action="" method="post" id="register-form" novalidate="novalidate">
        <div class="label">Username</div><input type="text" id="username" name="username" /> <br />
        <div class="label">Password</div><input type="password" id="password" name="password" /> <br />
        <input type="submit" name="submit" value="Login" />
    </form>'
);

echo $page->display();
