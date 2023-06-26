<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mahasiswa extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable=[
        'nim',
        'nomor_absen',
        'nama',
        'jeniskelamin',
        'foto'
    ];
    protected $guarded = [
        'updated_at',
        'created_at'
    ];
}