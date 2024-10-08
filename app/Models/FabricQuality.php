<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricQuality extends Model
{
    use HasFactory;

    protected $table = 'fabric_quality'; // Ensure this matches the table name
    protected $fillable = ['name'];
}