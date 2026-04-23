<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Show all payments
    public function index()
    {
        $payments = Payment::with('order.riceItem')->get();

        return view('payments.index', compact('payments'));
    }

    // Show payment page
    public function show(Payment $payment)
    {
        $order = $payment->order;

        return view('payments.process', compact('payment', 'order'));
    }

    // Process payment
    public function process(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:cash,card,online',
        ]);

        if ($payment->status === 'paid') {
            return back()->withErrors([
                'status' => 'This payment has already been processed.'
            ]);
        }

        $payment->update([
            'status' => 'paid',
            'payment_date' => now(),
            'payment_method' => $validated['payment_method'],
        ]);

        $payment->order->update([
            'status' => 'completed'
        ]);

        return redirect()
            ->route('payments.show', $payment)
            ->with('success', 'Payment processed successfully!');
    }
}