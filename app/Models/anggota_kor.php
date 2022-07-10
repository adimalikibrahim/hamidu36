<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota_kor extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'anggota_kors';
    protected $fillable = [
        'id_anggota_kor',
        'id_kordinator',
        'id_alumni',
    ];

}
