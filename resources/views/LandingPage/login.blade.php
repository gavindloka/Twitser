<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twitser</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-top-container">
            <div class="login-logo-container">
                <img src="{{ asset('images/twitterlogo.png') }}" class="login-logo" alt="">
            </div>
            <p class="login-slogan"><b>Log in to Twitser</b></p>
            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <input
                    type="text"
                    name="username"
                    value=""
                    placeholder="Enter Your Username"
                    class="login-input">
                <input type="password" name="password" placeholder="Enter Your Password" class="login-input">
                <span class="login-checkbox-container">
                    <input type="checkbox" name="remember_me" class="login-checkbox">
                    <p>Remember Me</p>
                </span>
                <button type="submit" class="login-button-submit">Log In</button>
            </form>
        </div>
        <div class="login-bottom-container">
            <p class="login-singup-text"><span>Don't have an account ?</span> <a href="{{ route('register_page') }}" class="sign-up-text">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
