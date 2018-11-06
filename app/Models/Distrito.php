<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    // 
    protected $table = 'distritos';
    public $primarykey = 'id';

    static public function listar_distrito_id($id)
    {
        $distritos = Distrito::select('distritos.id','distritos.nombre_distrito')
                                        ->where('distritos.id',$id)
                                        ->where('distritos.nEstado',1)
                                        ->get();                                
      
      return $distritos;

    }

    static public function listar_distritos()
    {
        $distritos = Distrito::select('distritos.id','distritos.nombre_distrito')
                                        ->where('distritos.nEstado',1)
                                        ->get();                                
      
      return $distritos;

    }


}

