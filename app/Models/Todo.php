<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Controllers\TodoController;

class Todo extends Model
{
    protected $fillable = ['name', 'is_complete'];
    use HasFactory;
}
