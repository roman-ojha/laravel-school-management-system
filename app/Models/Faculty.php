<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public $table = 'faculties';

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teachers_faculties');
    }
}
