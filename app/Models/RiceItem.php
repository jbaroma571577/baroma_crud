<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiceItem extends Model
{
    use HasFactory;

    protected $table = 'rice_items';

    protected $fillable = [
        'name',
        'price_per_kg',
        'stock_quantity',
        'description',
    ];

    protected $casts = [
        'price_per_kg' => 'decimal:2',
    ];

    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
