<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function library()
    {
        return $this->belongsToMany(Library::class, 'library_students')->withPivot('id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
