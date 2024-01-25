<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $connection = 'mysql2';

    protected $fillable = [
        'name',
        'nim',
        'gender',
        'place_birth',
        'date_birth',
        'telp',
        'email',
        'address',
        'religion',
        'majors_id',
        'school_id',
        'img',
        'date_in',
        'date_out',
        'notes',
        'uid',
        'img_surat',
        'img_kuitansi',
        'img_keterangansehat',
        'penilaian',
        'status',
    ];

    protected $casts = [
        'date_birth' => 'date',
        'date_in' => 'date',
        'date_out' => 'date',
    ];


    public function uid()
    {
        return $this->hasOne(\App\Models\Uid::class, 'id_siswa', 'id');
    }

    public function absen()
    {
        return $this->hasMany(\App\Models\Absensi::class, 'id_siswa', 'id');
    }
}
