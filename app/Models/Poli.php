<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the Daftar for the Poli
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Daftar(): HasMany
    {
        return $this->hasMany(Daftar::class, 'poli', 'id');
    }
}
