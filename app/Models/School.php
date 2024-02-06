<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools';
    protected $connection = 'mysql2';
    protected $fillable = [
        'name', 
        'teacher_name', 
        'teacher_phone'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'school_id', 'id');
    }
}
