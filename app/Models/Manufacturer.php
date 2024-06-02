<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
