<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsportData extends Model
{
    use HasFactory;

    protected $table = 'esport_data';

    protected $fillable = [
        'date',
        'matches',
        'red_blue',
        'win_lose',
        'team',
        'opponent',
        'total_kills',
        'time',
        'hero',
        'name',
        'shooter',
        'kill',
        'death',
        'assis',
        'kd',
        'teamfight_participation_rate',
        'damage_dealt',
        'damage_taken',
        'economy',
        'damage_even_distribution',
        'damage_dealt_even_distribution2',
        'economy_even_distribution',
        'gold_to_damage_ratio',
        'gold_to_damage_taken_ratio',
        '10_minute_gold_individual',
        '10_minute_gold_difference_team',
    ];
}
