<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Jake's Rice</title>
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        color: #333;
        padding: 0;
    }
    
    header {
        background: #333;
        color: white;
        padding: 20px;
        border-bottom: 3px solid #555;
    }
    
    header h1 {
        display: inline;
        margin-right: 30px;
    }
    
    nav {
        display: inline;
    }
    
    nav a, nav span {
        color: white;
        text-decoration: none;
        margin-right: 20px;
        font-size: 14px;
    }
    
    nav a:hover {
        text-decoration: underline;
    }
    
    nav button {
        background: #c33;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    main {
        background: white;
        padding: 20px;
        border: 1px solid #ddd;
    }
    
    h2 {
        margin-bottom: 20px;
        border-bottom: 2px solid #333;
        padding-bottom: 10px;
    }
    
    .alert {
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid;
    }
    
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }
    
    .alert-error {
        background: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }
    
    .btn {
        display: inline-block;
        padding: 8px 15px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border: 1px solid #007bff;
        cursor: pointer;
        font-size: 14px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    
    .btn:hover {
        background: #0056b3;
        border-color: #0056b3;
    }
    
    .btn-success {
        background: #28a745;
        border-color: #28a745;
    }
    
    .btn-success:hover {
        background: #1e7e34;
        border-color: #1e7e34;
    }
    
    .btn-primary {
        background: #007bff;
        border-color: #007bff;
    }
    
    .btn-primary:hover {
        background: #0056b3;
        border-color: #0056b3;
    }
    
    .btn-danger {
        background: #dc3545;
        border-color: #dc3545;
    }
    
    .btn-danger:hover {
        background: #a02835;
        border-color: #a02835;
    }
    
    .btn-warning {
        background: #ffc107;
        color: #333;
        border-color: #ffc107;
    }
    
    .btn-warning:hover {
        background: #e0a800;
        border-color: #e0a800;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    table th {
        background: #f0f0f0;
        padding: 10px;
        text-align: left;
        border-bottom: 2px solid #333;
        font-weight: bold;
    }
    
    table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    
    table tr:hover {
        background: #f9f9f9;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }
    
    textarea {
        resize: vertical;
        min-height: 100px;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 30px;
    }
    
    .dashboard-card {
        background: #007bff;
        color: white;
        padding: 20px;
        text-align: center;
        border: 1px solid #0056b3;
    }
    
    .dashboard-card:nth-child(2) {
        background: #e74c3c;
        border-color: #c0392b;
    }
    
    .dashboard-card:nth-child(3) {
        background: #27ae60;
        border-color: #229954;
    }
    
    .dashboard-card:nth-child(4) {
        background: #f39c12;
        border-color: #d68910;
    }
    
    .dashboard-card h3 {
        font-size: 28px;
        margin-bottom: 5px;
    }
    
    .dashboard-card p {
        font-size: 13px;
    }
    
    footer {
        background: #333;
        color: white;
        text-align: center;
        padding: 15px;
        margin-top: 30px;
        border-top: 3px solid #555;
        font-size: 13px;
    }
    
    .error-list {
        background: #ffe6e6;
        border: 1px solid #ffcccc;
        padding: 10px;
        margin-bottom: 15px;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        nav {
            display: block;
        }
        
        nav a {
            display: block;
            margin-bottom: 10px;
        }
        
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>
<body>
    <header>
        <h1>Jake's Rice</h1>
        <nav>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('rice.index') }}">Rice Menu</a>
                <a href="{{ route('orders.index') }}">My Orders</a>
                <a href="{{ route('payments.index') }}">Payments</a>
                <span>{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest
        </nav>
    </header>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Error:</strong>
                <ul style="margin-left: 20px; margin-top: 5px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <strong>Success:</strong> {{ session('success') }}
            </div>
        @endif

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <p>&copy; 2026 Jake's Rice</p>
    </footer>
</body>
</html>
