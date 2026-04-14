<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rice Ordering System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            background-color: white;
            border: 1px solid #ddd;
            padding: 30px;
            max-width: 500px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 15px;
        }

        p {
            font-size: 1em;
            margin-bottom: 20px;
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: 1px solid #007bff;
        }

        .btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: white;
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-secondary:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rice Ordering System</h1>
        <p>Manage your rice products, orders, and payments in one place</p>

        @auth
            <a href="{{ route('dashboard') }}" class="btn">Go to Dashboard</a>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        @endguest
    </div>
</body>
</html>
