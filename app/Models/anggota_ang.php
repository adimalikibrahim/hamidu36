<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota_ang extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'anggota_angs';
    protected $fillable = [
        'id_anggota_ang',
        'id_angkatan',
        'id_alumni',
    ];
}
