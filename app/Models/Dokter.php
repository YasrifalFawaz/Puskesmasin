<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    /**
     * Get all of the Daftar for the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Daftar(): HasMany
    {
        return $this->hasMany(Daftar::class, 'dokter_id', 'id');
    }
}
