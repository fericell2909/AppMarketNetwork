<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    public $primarykey = 'id';

    static public function listar_departamento_id($id)
    {
        $departamento = Departamento::select('departamentos.id','departamentos.nombre_departamento')
                                        ->where('departamentos.id',$id)
                                        ->where('departamentos.nEstado',1)
                                        ->get();                                
      
      return $departamento;

    }

    static public function listar_departamentos()
    {
        $departamento = Departamento::select('departamentos.id','departamentos.nombre_departamento')
                                        ->where('departamentos.nEstado',1)
                                        ->get();                                
      
      return $departamento;

    }
}
