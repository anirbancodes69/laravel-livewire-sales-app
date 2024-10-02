<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'quantity', 'unit_cost', 'profit_margin', 'shipping_cost', 'total_cost', 'selling_price'];
}