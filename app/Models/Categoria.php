<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $primarykey = 'id';

    static public function ListarCategorias()
    {
    	return Categoria::select('categorias.id','categorias.nombre_categoria')
    					->where('categorias.nEstado',1)
    					->whereNotIn('categorias.id',array(4))
    					->get();
    }

    static public function ListarCategoriasTodas()
    {
    	return Categoria::select('categorias.id','categorias.nombre_categoria')
    					->where('categorias.nEstado',1)
    					->get();
    }
}
