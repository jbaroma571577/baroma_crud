<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('order.riceItem')->get();

        return view('payments.index', compact('payments'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $payment = $order->payment;

        return view('payments.show', compact('order', 'payment'));
    }

    public function process(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'payment_method' => 'required|in:cash,card,online',
        ]);

        $payment = $order->payment;

        if ($payment->status === 'paid') {
            return back()->withErrors(['status' => 'This order has already been paid.']);
        }

        // Update payment
        $payment->update([
            'status' => 'paid',
            'payment_date' => now(),
            'payment_method' => $validated['payment_method'],
        ]);

        $order->update(['status' => 'completed']);

        return redirect()->route('payments.index')->with('success', 'Payment processed successfully!');
    }
}
