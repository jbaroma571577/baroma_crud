<?php

namespace App\Http\Controllers;

use App\Models\RiceItem;
use Illuminate\Http\Request;

class RiceController extends Controller
{
    public function index()
    {
        $riceItems = RiceItem::all();
        return view('rice.index', compact('riceItems'));
    }

    public function create()
    {
        return view('rice.create');
    }

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

    public function show(RiceItem $rice)
    {
        return view('rice.show', compact('rice'));
    }

    public function edit(RiceItem $rice)
    {
        return view('rice.edit', compact('rice'));
    }

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

    public function destroy(RiceItem $rice)
    {
        $rice->delete();

        return redirect()->route('rice.index')->with('success', 'Rice item deleted successfully!');
    }
}
