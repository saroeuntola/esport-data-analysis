<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = ['hero_name', 'hero_image', 'role'];

    public function picks()
    {
        return $this->hasMany(PlayerMatchStats::class, 'hero_id');
    }
}
