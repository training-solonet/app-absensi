<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uid extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'uid';

    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $fillable = ['id_siswa', 'uid'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
