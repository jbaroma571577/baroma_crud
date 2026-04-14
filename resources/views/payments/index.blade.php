@extends('layouts.app')

@section('title', 'Payments')

@section('content')
    <h2>Payment History</h2>

    @if ($payments->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Rice Item</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>#{{ $payment->order->id }}</td>
                        <td>{{ $payment->order->riceItem->name }}</td>
                        <td>{{ number_format($payment->amount, 2) }}</td>
                        <td>{{ ucfirst($payment->status) }}</td>
                        <td>{{ $payment->payment_date ? $payment->payment_date->format('M d, Y') : '-' }}</td>
                        <td><a href="{{ route('payments.show', $payment->order) }}" class="btn btn-primary">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No payments yet.</p>
        <p><a href="{{ route('orders.create') }}" class="btn btn-success">Create an Order</a></p>
    @endif
@endsection
