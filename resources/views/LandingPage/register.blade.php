<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twitser</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="{{ asset('javascript/index.js') }}" defer></script>
</head>
<body>
    <div class="register-container">
        <div class="register-top-container">
            <div class="register-logo-container">
                <img src="{{ asset('images/twitterlogo.png') }}" class="register-logo" alt="">
            </div>
            <p class="register-slogan"><b>Create your Twitser account</b></p>
            <form action="{{ route('register') }}" method="POST" class="register-form" enctype="multipart/form-data">
                @csrf
                <div class="register-image-container">
                    <img
                    src="http://via.placeholder.com/150x150"
                    style="
                        border-radius: 50%;
                        width: 100px;
                        height: 100px;
                        object-fit: cover;
                    "
                    id="profile-image"
                    />
                </div>
                <input type="file" id="profile-file" name="image" style="display: none" />
                <input type="text" name="email" placeholder="Enter Your Email" class="register-input">
                <input type="text" name="phone_number" placeholder="Enter Your Phone Number"  class="register-input">
                <input type="text" name="username" placeholder="Enter Your Username" class="register-input">
                <input type="password" name="password" placeholder="Enter Your Password" class="register-input">
                <textarea name="bio" placeholder="Enter Your Bio" class="register-textarea-input"></textarea>
                <button type="submit" class="register-button-submit">Sign In</button>
            </form>
            @if ($errors->any())
                <p style="color:red">
                    {{$errors->first()}}
                </p>
            @endif
        </div>
        <div class="register-bottom-container">
            <p class="register-singup-text"><span>Have an account ?</span> <a href="{{ route('login_page') }}" class="sign-up-text">Log In</a></p>
        </div>
    </div>
</body>
</html>
