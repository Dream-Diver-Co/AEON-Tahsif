<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchageOrder extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
