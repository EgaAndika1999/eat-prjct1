<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WEBSiTE-EAT</title>
    <link rel="shortcut icon" href="img/cat-solid.svg">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 400px;
        }

        .login-container img {
            width: 100px;
            margin-bottom: 20px;
        }

        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container .remember {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .login-container a {
            text-decoration: none;
            color: #007bff;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .social-login {
            margin-top: 20px;
        }

        .social-login button {
            width: 30%;
            margin: 0 5px;
        }

        .error {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="img/cat-solid.svg" alt="Logo">
        <h1>Login</h1>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}">
            @error('name')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror
            
            <input type="text" name="username" placeholder="Your Email" value="{{ old('username') }}">
            @error('username')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror
        
            <input type="password" name="password" placeholder="Password">
            @error('password')  
                <div class="error">
                    {{ $message }}
                </div>
            @enderror
        
            <div class="remember">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Log in</button>
        </form>
    </div>
</body>
</html>
