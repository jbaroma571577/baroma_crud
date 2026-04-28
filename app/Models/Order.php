<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'rice_item_id',
        'quantity',
        'price_per_kg',
        'total_amount',
        'status',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
        'price_per_kg' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function riceItem()
    {
        return $this->belongsTo(RiceItem::class);
    }

    
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
