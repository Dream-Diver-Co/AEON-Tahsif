<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricContent extends Model
{
    use HasFactory;

    protected $table = 'fabric_content'; // Ensure this matches the table name
    protected $fillable = ['name'];
}
