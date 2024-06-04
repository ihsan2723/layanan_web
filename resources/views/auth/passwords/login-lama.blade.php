<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        padding: 40px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-form h2 {
        margin-bottom: 30px;
        color: #333;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    .form-group input:focus {
        border-color: #007bff;
    }

    .form-group button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #0056b3;
    }

    .text-center {
        text-align: center;
    }
    </style>
</head>

<body>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</body>

</html>