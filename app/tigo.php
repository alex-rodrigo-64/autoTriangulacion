<?php

namespace App;

use Maatwebsite\Excel\Concerns\ToModel;

class tigo implements ToModel
{
    public function model(array $row)
    {
        return new tigoExcel([
            'llamada' => $row[0],
            'numeroA' => $row[1],
            'numeroB' => $row[2],
            'fecha' => $row[4],
            'tiempo' => $row[5],
            'ciudad' => $row[7],
            'sitio' => $row[8],
            'longitud' => $row[10],
            'latitud' => $row[11],
            'punto_cardinal' =>$row[12],
            
        ]);
    }
}