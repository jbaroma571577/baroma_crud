<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jake's Rice</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            padding: 50px;
            text-align: center;
        }
        
        .container {
            background: white;
            padding: 40px;
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #ddd;
        }
        
        h1 {
            margin-bottom: 15px;
        }
        
        p {
            margin-bottom: 25px;
            color: #666;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border: 1px solid #007bff;
        }
        
        .btn:hover {
            background: #0056b3;
            border-color: #0056b3;
        }
        
        .btn-secondary {
            background: white;
            color: #333;
            border-color: #ddd;
        }
        
        .btn-secondary:hover {
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jake's Rice</h1>
        <p>Order fresh rice online</p>

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
