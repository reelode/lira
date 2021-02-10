<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class)->first();
    }
    public function listCol()
    {
        return $this->belongsTo(ListCol::class)->first();
    }
}
