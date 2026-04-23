@extends('layouts.app')

@section('title', 'Process Payment')

@section('content')
<div class="container mt-4">

    <h2>Process Payment for Order #{{ $order->id }}</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <h4>Order Summary</h4>

    <p><strong>Rice Item:</strong> {{ $order->riceItem->name ?? 'N/A' }}</p>

    <p><strong>Quantity:</strong> {{ $order->quantity }}</p>

    <p><strong>Total Price:</strong>
        ₱{{ number_format($order->total_price, 2) }}
    </p>

    <p><strong>Order Status:</strong>
        {{ ucfirst($order->status) }}
    </p>

    <form action="{{ route('payments.process', $payment) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Payment Method</label>

            <select name="payment_method" class="form-control" required>
                <option value="">Select Payment Method</option>
                <option value="cash">Cash</option>
                <option value="card">Card</option>
                <option value="online">Online Payment</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Confirm Payment
        </button>
    </form>

</div>
@endsection