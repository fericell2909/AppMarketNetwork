<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table = 'meses';
    public $primarykey = 'id';

    public static function Listar_Meses()
    {
    	return Mes::select("meses.id","meses.nombre_mes")
            			->get();

        
    }
}
