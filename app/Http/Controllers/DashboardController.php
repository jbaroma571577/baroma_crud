<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\RiceItem;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function index()
    {
        $totalOrders = Order::where('user_id', Auth::id())->count();
        $totalSpent = Order::where('user_id', Auth::id())->sum('total_amount');
        $riceItems = RiceItem::count();
        $pendingPayments = Order::where('user_id', Auth::id())
            ->whereHas('payment', function ($query) {
                $query->where('status', 'unpaid');
            })
            ->count();

        return view('dashboard', compact('totalOrders', 'totalSpent', 'riceItems', 'pendingPayments'));
    }
}
