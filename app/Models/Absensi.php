<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absen';

    protected $connection = 'mysql';
    

    protected $fillable = [
        'id',
        'id_siswa',
        'uid',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'keterangan',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class, 'id_siswa', 'id');
    }

    public function majors()
    {
        return $this->belongsTo(Major::class, 'majors_id', 'id');
    }

}
