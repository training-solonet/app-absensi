<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = 'majors';
    protected $connection = 'mysql2';
    protected $fillable = [ 
        'id', 
        'name', 
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'majors_id', 'id');
    }

    public function absen()
    {
        return $this->hasMany(Absensi::class, 'majors_id', 'id');
    }
}
