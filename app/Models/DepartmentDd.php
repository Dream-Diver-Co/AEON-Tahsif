<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentDd extends Model
{
    use HasFactory;
    protected $table = 'department_dd';

    protected $fillable = ['name']; // Specify the fields that are mass assignable
}
