<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function manufacturers()
    {
        return $this->hasMany(Manufacturer::class);
    }

    public function purchageOrders()
    {
        return $this->hasMany(PurchageOrder::class);
    }
}
