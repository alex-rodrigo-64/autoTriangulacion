<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tigoExcel extends Model
{
    protected $fillable = [
        'llamada','numeroA', 'numeroB','fecha','tiempo','ciudad','sitio', 'longitud', 'latitud', 'punto_cardinal',
    ];


     public function matriz(){
        
            $vertical = DB::table('tigos')             //contar arreglo con count($vertical)
                            ->select('numero_usuario')
                            ->get();

            $horizontal = DB::table('tigo_excels')           //contar arreglo con count($horizontal)
                            ->select('identificador')
                            ->groupBy('identificador')
                            ->get();

            $Matriz[0][0] = 0;

            for ($i=1; $i < count($vertical)+1 ; $i++) { 
                for ($j=0; $j < count($horizontal)+1 ; $j++) { 

                    if ($j==0) {
                        $Matriz[$i][0] = $vertical[$i-1]->numero_usuario;
                    }else{
                        $Matriz[$i][$j]=0;
                    }
                   
                }
            }


            for ($i=0; $i < count($horizontal) ; $i++) { 
                $Matriz[0][$i+1] = $horizontal[$i]->identificador;
            }

            for ($i=1; $i < count($vertical)+1 ; $i++) { 
                for ($j=1; $j < count($horizontal)+1 ; $j++) { 

                    $consulta = DB::table('tigo_excels')
                                ->select('*')
                                ->where('identificador','=',$Matriz[0][$j])
                                ->where('numeroA','=',$Matriz[$i][0])
                                ->exists();

                    $consulta1 = DB::table('tigo_excels')
                                ->select('*')
                                ->where('identificador','=',$Matriz[0][$j])
                                ->where('numeroB','=',$Matriz[$i][0])
                                ->exists();

                    if($consulta || $consulta1){

                        $Matriz[$i][$j] = 1;
                    }else{
                        $Matriz[$i][$j] = 0;
                    }
                }
             
            }

            return $Matriz;

    }
}
