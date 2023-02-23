<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function library()
    {
        return $this->hasOne(Library::class);
    }

    public function ab()
    {
        return $this->belongsTo(Library::class);
    }
}
