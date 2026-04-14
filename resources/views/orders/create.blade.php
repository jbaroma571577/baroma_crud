@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
    <h2>Create New Order</h2>

    <form action="{{ route('orders.store') }}" method="POST" style="max-width: 600px;">
        @csrf

        <div class="form-group">
            <label for="rice_item_id">Select Rice Item</label>
            <select id="rice_item_id" name="rice_item_id" required onchange="updatePrice()">
                <option value="">-- Choose a rice item --</option>
                @foreach ($riceItems as $rice)
                    <option value="{{ $rice->id }}" data-price="{{ $rice->price_per_kg }}" data-stock="{{ $rice->stock_quantity }}">
                        {{ $rice->name }} - {{ number_format($rice->price_per_kg, 2) }}/kg (Stock: {{ $rice->stock_quantity }} kg)
                    </option>
                @endforeach
            </select>
            @error('rice_item_id')<span class="error-message">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="quantity">Quantity (kg)</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" step="0.01" min="0.01" required onchange="calculateTotal()">
            <small>Available: <span id="stock-info">-</span> kg</small>
            @error('quantity')<span class="error-message">{{ $message }}</span>@enderror
        </div>

        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px;">
            <p>Price per kg: <span id="unit-price">0.00</span></p>
            <p><strong>Total Amount: <span id="total-price">0.00</span></strong></p>
        </div>

        <button type="submit" class="btn btn-success">Place Order</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    <script>
        function updatePrice() {
            const select = document.getElementById('rice_item_id');
            const option = select.options[select.selectedIndex];
            const price = option.getAttribute('data-price') || 0;
            const stock = option.getAttribute('data-stock') || 0;
            document.getElementById('unit-price').textContent = parseFloat(price).toFixed(2);
            document.getElementById('stock-info').textContent = stock;
            calculateTotal();
        }

        function calculateTotal() {
            const quantity = parseFloat(document.getElementById('quantity').value) || 0;
            const select = document.getElementById('rice_item_id');
            const option = select.options[select.selectedIndex];
            const price = parseFloat(option.getAttribute('data-price')) || 0;
            const stock = parseFloat(option.getAttribute('data-stock')) || 0;
            const total = quantity * price;
            document.getElementById('total-price').textContent = total.toFixed(2);
            if (quantity > stock) {
                document.getElementById('quantity').style.borderColor = '#e74c3c';
            } else {
                document.getElementById('quantity').style.borderColor = '#ddd';
            }
        }
    </script>
@endsection
