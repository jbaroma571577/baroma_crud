<?php

namespace App\Http\Controllers;

use App\Models\RiceItem;
use Illuminate\Http\Request;

class RiceController extends Controller
{
    /**
     * Display a listing of rice items.
     */
    public function index()
    {
        $riceItems = RiceItem::all();
        return view('rice.index', compact('riceItems'));
    }

    /**
     * Show the form for creating a new rice item.
     */
    public function create()
    {
        return view('rice.create');
    }

    /**
     * Store a newly created rice item in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        RiceItem::create($validated);

        return redirect()->route('rice.index')->with('success', 'Rice item created successfully!');
    }

    /**
     * Display the specified rice item.
     */
    public function show(RiceItem $rice)
    {
        return view('rice.show', compact('rice'));
    }

    /**
     * Show the form for editing the specified rice item.
     */
    public function edit(RiceItem $rice)
    {
        return view('rice.edit', compact('rice'));
    }

    /**
     * Update the specified rice item in database.
     */
    public function update(Request $request, RiceItem $rice)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $rice->update($validated);

        return redirect()->route('rice.index')->with('success', 'Rice item updated successfully!');
    }

    /**
     * Remove the specified rice item from database.
     */
    public function destroy(RiceItem $rice)
    {
        $rice->delete();

        return redirect()->route('rice.index')->with('success', 'Rice item deleted successfully!');
    }
}
