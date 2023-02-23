<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function teaches()
    {
        return $this->belongsToMany(Subject::class, 'teachers_subjects');
    }

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'teachers_faculties');
    }
}
