<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\RiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index()
    {
        $orders = Order::with('riceItem', 'user')->where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        $riceItems = RiceItem::where('stock_quantity', '>', 0)->get();
        return view('orders.create', compact('riceItems'));
    }

    /**
     * Store a newly created order in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rice_item_id' => 'required|exists:rice_items,id',
            'quantity' => 'required|numeric|min:0.01',
        ]);

        $riceItem = RiceItem::findOrFail($validated['rice_item_id']);

        // Check if stock is available
        if ($riceItem->stock_quantity < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Insufficient stock available.']);
        }

        $totalAmount = $validated['quantity'] * $riceItem->price_per_kg;

        $order = Order::create([
            'user_id' => Auth::id(),
            'rice_item_id' => $validated['rice_item_id'],
            'quantity' => $validated['quantity'],
            'price_per_kg' => $riceItem->price_per_kg,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        // Reduce stock
        $riceItem->update([
            'stock_quantity' => $riceItem->stock_quantity - $validated['quantity'],
        ]);

        // Create payment record
        $order->payment()->create([
            'amount' => $totalAmount,
            'status' => 'unpaid',
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        // Check authorization
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }
}
