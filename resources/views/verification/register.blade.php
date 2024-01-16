<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
           
            font-family: Arial, sans-serif;
        }

        .email-container {
            text-align: center;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
         
         
   
        }

      

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .user-info {
            text-align: left;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .user-info p {
            margin: 8px 0;
            
        }

        .button {
            display: inline-block;
            padding: 10px 20px;           
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

       

        .footer {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body >
    <div class="container" >
        <div class="email-container">
            <div class="header">
                <h1 class="title">Register Here</h1>
            </div>
            <p class="content">
                Thanks for registering! Please check your email and click the button below to complete your registration:
            </p>
            <div class="user-info">
                <p>Email: {{ $email }}</p>
                <p>Username: {{ $userName }}</p>
                <p>Password: {{ $plainPassword }}</p>
            </div>
            <a href="http://127.0.0.1:8000/" class="button" style="color:white; background-color:black; ">Register</a>
            <p class="footer">
                Thanks for choosing {{ config('app.name') }}!
            </p>
            <hr>
            <p class="footer">Copyright &copy; All Rights reserved</p>
        </div>
    </div>
</body>
</html>
