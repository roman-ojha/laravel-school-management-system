<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    public $table = 'library';


    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'library_students');
    }
}
