<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function purchageOrders()
    {
        return $this->hasMany(PurchageOrder::class);
    }
}
