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
            'fecha' => $row[3],
            'tiempo' => $row[4],
            'ciudad' => $row[6],
            'sitio' => $row[7],
            'longitud' => $row[9],
            'latitud' => $row[10],
            'punto_cardinal' =>$row[11],
            
        ]);
    }
}