<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; font-family: Arial, sans-serif;">
    <div style="text-align: center; max-width: 400px; padding: 20px; background-color: #fff; border-radius: 8px;">
        <div style="font-size: 17px; font-weight: bold; margin-bottom: 20px;">
            <h1>Register Here</h1>
        </div>
        <p style="font-size: 16px; margin-bottom: 20px;">
            Thanks for registering! Please check your email and click the button below to complete your registration:
        </p>
        <div style="text-align: left; margin-bottom: 20px; font-size: 16px;">
            <p>Email: {{ $email }}</p>
            <p>Username: {{ $userName }}</p>
            <p>Password: {{ $plainPassword }}</p>
        </div>
        <a href="http://127.0.0.1:8000/" style="display: inline-block; padding: 10px 20px; text-decoration: none; border-radius: 5px; transition: background-color 0.3s; color: white; background-color: black; margin-bottom: 15px;">
            Register
        </a>
        <div style="margin-bottom: 15px;">
            <img style="max-width: 100%; height: auto;" src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('images/logo.png'))) }}" alt="Logo">
        </div>
        <hr style="margin-top: 15px; margin-bottom: 15px;">
        <p style="font-size: 14px; color: #666;">Copyright &copy; All Rights reserved</p>
    </div>
</body>
</html>
