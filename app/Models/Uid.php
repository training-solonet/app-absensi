<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uid extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'uids';

    protected $fillable = [
        'uid',
        'id_siswa',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
