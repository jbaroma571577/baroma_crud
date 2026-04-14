@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard</h2>
    <p>Welcome, {{ Auth::user()->name }}!</p>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h3>{{ $totalOrders }}</h3>
            <p>Total Orders</p>
        </div>
        <div class="dashboard-card">
            <h3>{{ $totalSpent }}</h3>
            <p>Total Spent</p>
        </div>
        <div class="dashboard-card">
            <h3>{{ $riceItems }}</h3>
            <p>Rice Products</p>
        </div>
        <div class="dashboard-card">
            <h3>{{ $pendingPayments }}</h3>
            <p>Pending Payments</p>
        </div>
    </div>

    <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">

    <h3>Quick Actions</h3>
    <div style="margin-top: 20px;">
        <p><a href="{{ route('rice.index') }}" class="btn btn-primary">View Rice Menu</a></p>
        <p><a href="{{ route('orders.create') }}" class="btn btn-success">Create Order</a></p>
        <p><a href="{{ route('payments.index') }}" class="btn btn-danger">View Payments</a></p>
    </div>
@endsection
