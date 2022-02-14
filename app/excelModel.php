<?php

namespace App;

use Maatwebsite\Excel\Concerns\ToModel;

class excelModel implements ToModel
{
    public function model(array $row)
    {
    

        return new excel([
            'llamada' => $row[1],
            'numeroA' => $row[2],
            'radio_baseA' => $row[4],
            'coordenadaA' => $row[6],
            'numeroB' => $row[7],
            'radio_baseB' => $row[9],
            'coordenadaB' => $row[11],
            'fecha' => $row[12],
            'tiempo' => $row[13],
        ]);
    }
}
