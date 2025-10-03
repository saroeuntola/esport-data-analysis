<?php

namespace App\Imports;

use App\Models\EsportData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EsportDataImport implements ToModel
{
    
    public function model(array $row)
    {
        return new EsportData([
            'date' => $row[0] ?? null,
            'matches' => $row[1] ?? null,
            'red_blue' => $row[2] ?? null,
            'win_lose' => $row[3] ?? null,
            'team' => $row[4] ?? null,
            'opponent' => $row[5] ?? null,
            'total_kills' => $row[6] ?? null,
            'time' => $row[7] ?? null,
            'hero' => $row[8] ?? null,
            'name' => $row[9] ?? null,
            'shooter' => $row[10] ?? null,
            'kill' => $row[11] ?? null,
            'death' => $row[12] ?? null,
            'assis' => $row[13] ?? null,
            'kd' => $row[14] ?? null,
            'teamfight_participation_rate' => $row[15] ?? null,
            'damage_dealt' => $row[16] ?? null,
            'damage_taken' => $row[17] ?? null,
            'economy' => $row[18] ?? null,
            'damage_even_distribution' => $row[19] ?? null,
            'damage_dealt_even_distribution2' => $row[20] ?? null,
            'economy_even_distribution' => $row[21] ?? null,
            'gold_to_damage_ratio' => $row[22] ?? null,
            'gold_to_damage_taken_ratio' => $row[23] ?? null,
            '10_minute_gold_individual' => $row[24] ?? null,
            '10_minute_gold_difference_team' => $row[25] ?? null,
        ]);
    }
}
