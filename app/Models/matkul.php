<?php

namespace App\Models;

use App\Models\jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';

    public function jadwal(): HasMany
    {
        return $this->hasMany(jadwal::class, 'id_matkul');
    }
}