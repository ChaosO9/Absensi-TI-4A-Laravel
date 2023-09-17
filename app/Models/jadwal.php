<?php

namespace App\Models;

use App\Models\matkul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    public function matkul(): BelongsTo
    {
        return $this->belongsTo(matkul::class);
    }
}