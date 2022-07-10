<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'alumnis';
    protected $primaryKey = 'id_alumni';
    protected $fillable = [
        'id_alumni',
        'urut',
        'nia',
        'nama',
        'jk',
        'prov',
        'kab',
        'kec',
        'desa',
        'hp',
        'image',
        'id_kordinator',
        'id_angkatan',
        'id_asrama',
    ];

}
