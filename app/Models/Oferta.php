<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB as DB;

use App\Models\OfertaPrivada as OfertaPrivada; 

class Oferta extends Model
{
    protected $table = 'ofertas';
    public $primarykey = 'id';

   public static function Listar_Ofertas_Publicas()
   {

		return DB::select("call usp_listar_ofertas_publicas()");

   }


  public static function Listar_Ofertas_Cerradas_x_ID($codigo_oferta)
    {

    	return Oferta::select("ofertas.id","ofertas.titulo_oferta",
                              DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"),
                              DB::raw("round(ofertas.precio_real,2) as precio_real"),
							  DB::raw("round(ofertas.descuento,2) as descuento"),
							  "ofertas.fecha_inicio",
							  "ofertas.fecha_termino",
							  "ofertas.ruta_imagen_oferta",
							  "ofertas.calificacion_oferta",
							  "ofertas.total_comentarios",
							  "ofertas.prov_razon_social",
							  "ofertas.user_id",
							  "ofertas.nEstado_Oferta",
							  "ofertas.nTipo_Oferta",
							  "ofertas.nEstado",
							  "ofertas.categoria_id",
							  "ofertas.servicio_id",
							  "ofertas.created_at",
							  "ofertas.updated_at",
							  "ofertas.monedas_id"
                                  )
                            ->where('ofertas.id',$codigo_oferta)
                            ->where('ofertas.nEstado_Oferta',2)
                            ->get();
    }

    public static function Listar_Ofertas_Anuladas_x_ID($codigo_oferta)
    {

    	return Oferta::select("ofertas.id","ofertas.titulo_oferta",
                              DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"),
                              DB::raw("round(ofertas.precio_real,2) as precio_real"),
							  DB::raw("round(ofertas.descuento,2) as descuento"),
							  "ofertas.fecha_inicio",
							  "ofertas.fecha_termino",
							  "ofertas.ruta_imagen_oferta",
							  "ofertas.calificacion_oferta",
							  "ofertas.total_comentarios",
							  "ofertas.prov_razon_social",
							  "ofertas.user_id",
							  "ofertas.nEstado_Oferta",
							  "ofertas.nTipo_Oferta",
							  "ofertas.nEstado",
							  "ofertas.categoria_id",
							  "ofertas.servicio_id",
							  "ofertas.created_at",
							  "ofertas.updated_at",
							  "ofertas.monedas_id"
                                  )
                            ->where('ofertas.id',$codigo_oferta)
                            ->where('ofertas.nEstado_Oferta',3)
                            ->get();
    }


    public static function Listar_Ofertas_Vigentes_x_ID($codigo_oferta)
    {
    	return Oferta::select("ofertas.id","ofertas.titulo_oferta",
                              DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"),
                              DB::raw("round(ofertas.precio_real,2) as precio_real"),
							  DB::raw("round(ofertas.descuento,2) as descuento"),
							  "ofertas.fecha_inicio",
							  "ofertas.fecha_termino",
							  "ofertas.ruta_imagen_oferta",
							  "ofertas.calificacion_oferta",
							  "ofertas.total_comentarios",
							  "ofertas.prov_razon_social",
							  "ofertas.user_id",
							  "ofertas.nEstado_Oferta",
							  "ofertas.nTipo_Oferta",
							  "ofertas.nEstado",
							  "ofertas.categoria_id",
							  "ofertas.servicio_id",
							  "ofertas.created_at",
							  "ofertas.updated_at",
							  "ofertas.monedas_id",
							  "monedas.descripcion_moneda"
                                  )

					        ->join("monedas","monedas.id","=","ofertas.monedas_id")
                            ->where('ofertas.id',$codigo_oferta)
                            ->where('ofertas.nEstado_Oferta',1)
                            ->get();	
    } 
    public static function Listar_Ofertas_Vigentes_Publicas($codigo_proveedor)
    {
    	return Oferta::select("ofertas.id","ofertas.titulo_oferta",
                              DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"),
                              DB::raw("round(ofertas.precio_real,2) as precio_real"),
							  DB::raw("round(ofertas.descuento,2) as descuento"),
							  "ofertas.fecha_inicio",
							  "ofertas.fecha_termino",
							  "ofertas.ruta_imagen_oferta",
							  "ofertas.calificacion_oferta",
							  "ofertas.total_comentarios",
							  "ofertas.prov_razon_social",
							  "ofertas.user_id",
							  "ofertas.nEstado_Oferta",
							  "ofertas.nTipo_Oferta",
							  "ofertas.nEstado",
							  "ofertas.categoria_id",
							  "ofertas.servicio_id",
							  "ofertas.created_at",
							  "ofertas.updated_at",
							  "ofertas.monedas_id",
							  "estados_ofertas.nombre_estado_oferta",
							  "tipos_ofertas.nombre_tipos_oferta",
							  "monedas.descripcion_moneda"                                  
                                  )
                            ->join("estados_ofertas","estados_ofertas.id","=","ofertas.nEstado_Oferta")
                            ->join("tipos_ofertas","tipos_ofertas.id","=","ofertas.nTipo_Oferta")
                            ->join("monedas","monedas.id","=","ofertas.monedas_id")
                            ->where('ofertas.user_id',$codigo_proveedor)
                            ->where('ofertas.nEstado_Oferta',1)
                            ->where('ofertas.nTipo_Oferta',1)
                            //->whereIn('cotizaciones.estado_id', array(1, 2))
                            ->orderBy('ofertas.id','DESC')
                            ->paginate(8);
    }

    public static function Listar_Ofertas_Vigentes($codigo_proveedor)
    {
    	return Oferta::select("ofertas.id","ofertas.titulo_oferta",
                              DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"),
                              DB::raw("round(ofertas.precio_real,2) as precio_real"),
							  DB::raw("round(ofertas.descuento,2) as descuento"),
							  "ofertas.fecha_inicio",
							  "ofertas.fecha_termino",
							  "ofertas.ruta_imagen_oferta",
							  "ofertas.calificacion_oferta",
							  "ofertas.total_comentarios",
							  "ofertas.prov_razon_social",
							  "ofertas.user_id",
							  "ofertas.nEstado_Oferta",
							  "ofertas.nTipo_Oferta",
							  "ofertas.nEstado",
							  "ofertas.categoria_id",
							  "ofertas.servicio_id",
							  "ofertas.created_at",
							  "ofertas.updated_at",
							  "ofertas.monedas_id",
							  "estados_ofertas.nombre_estado_oferta",
							  "tipos_ofertas.nombre_tipos_oferta",
							  "monedas.descripcion_moneda"                                  
                                  )
                            ->join("estados_ofertas","estados_ofertas.id","=","ofertas.nEstado_Oferta")
                            ->join("tipos_ofertas","tipos_ofertas.id","=","ofertas.nTipo_Oferta")
                            ->join("monedas","monedas.id","=","ofertas.monedas_id")
                            ->where('ofertas.user_id',$codigo_proveedor)
                            ->where('ofertas.nEstado_Oferta',1)
                            //->whereIn('cotizaciones.estado_id', array(1, 2))
                            ->orderBy('ofertas.id','DESC')
                            ->paginate(4); 
    }

    public static function Listar_Ofertas_Cerradas($codigo_proveedor)
    {
    	return Oferta::select("ofertas.id","ofertas.titulo_oferta",
                              DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"),
                              DB::raw("round(ofertas.precio_real,2) as precio_real"),
							  DB::raw("round(ofertas.descuento,2) as descuento"),
							  "ofertas.fecha_inicio",
							  "ofertas.fecha_termino",
							  "ofertas.ruta_imagen_oferta",
							  "ofertas.calificacion_oferta",
							  "ofertas.total_comentarios",
							  "ofertas.prov_razon_social",
							  "ofertas.user_id",
							  "ofertas.nEstado_Oferta",
							  "ofertas.nTipo_Oferta",
							  "ofertas.nEstado",
							  "ofertas.categoria_id",
							  "ofertas.servicio_id",
							  "ofertas.created_at",
							  "ofertas.updated_at",
							  "ofertas.monedas_id",
							  "estados_ofertas.nombre_estado_oferta",
							  "tipos_ofertas.nombre_tipos_oferta",
							  "monedas.descripcion_moneda"                                  
                                  )
                            ->join("estados_ofertas","estados_ofertas.id","=","ofertas.nEstado_Oferta")
                            ->join("tipos_ofertas","tipos_ofertas.id","=","ofertas.nTipo_Oferta")
                            ->join("monedas","monedas.id","=","ofertas.monedas_id")
                            ->where('ofertas.user_id',$codigo_proveedor)
                            ->where('ofertas.nEstado_Oferta',2)
                            //->whereIn('cotizaciones.estado_id', array(1, 2))
                            ->orderBy('ofertas.id','DESC')
                            ->paginate(4); 
    }

    public static function Listar_Ofertas_Anuladas($codigo_proveedor)
    {
    	return Oferta::select("ofertas.id","ofertas.titulo_oferta",
                              DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"),
                              DB::raw("round(ofertas.precio_real,2) as precio_real"),
							  DB::raw("round(ofertas.descuento,2) as descuento"),
							  "ofertas.fecha_inicio",
							  "ofertas.fecha_termino",
							  "ofertas.ruta_imagen_oferta",
							  "ofertas.calificacion_oferta",
							  "ofertas.total_comentarios",
							  "ofertas.prov_razon_social",
							  "ofertas.user_id",
							  "ofertas.nEstado_Oferta",
							  "ofertas.nTipo_Oferta",
							  "ofertas.nEstado",
							  "ofertas.categoria_id",
							  "ofertas.servicio_id",
							  "ofertas.created_at",
							  "ofertas.updated_at",
							  "ofertas.monedas_id",
							  "estados_ofertas.nombre_estado_oferta",
							  "tipos_ofertas.nombre_tipos_oferta",
							  "monedas.descripcion_moneda"                                  
                                  )
                            ->join("estados_ofertas","estados_ofertas.id","=","ofertas.nEstado_Oferta")
                            ->join("tipos_ofertas","tipos_ofertas.id","=","ofertas.nTipo_Oferta")
                            ->join("monedas","monedas.id","=","ofertas.monedas_id")
                            ->where('ofertas.user_id',$codigo_proveedor)
                            ->where('ofertas.nEstado_Oferta',3)
                            //->whereIn('cotizaciones.estado_id', array(1, 2))
                            ->orderBy('ofertas.id','DESC')
                            ->paginate(4); 
    
    }

    public static function ActualizarRutaImagenOferta($ruta_imagen,$codigo_generado)
    {

        $data=array('ruta_imagen_oferta'=> $ruta_imagen);

        Oferta::where('id','=',$codigo_generado)
                        ->update($data);

        $data=null;

    	return true;
    }

    public static function EditarOferta(array $valores, $prov_razon_social, $id)
    {

		$categoria = Servicio::listar_codigo_servicio($valores['servicio_id']);
		$data =  array( 'titulo_oferta' =>  $valores['titulo_oferta'], 
						'precio_oferta' => $valores['precio_oferta'],
					    'precio_real' => $valores['precio_real'],
					    'descuento' => $valores['precio_real'] - $valores['precio_oferta'],
					    'fecha_inicio' => date_create($valores['fecha_inicio'])->format('Y-m-d H:i:s'),
     				    'fecha_termino' => date_create($valores['fecha_termino'])->format('Y-m-d H:i:s'),
					    'prov_razon_social'=> $prov_razon_social,
		 			    'user_id'=> $id,
					    'nEstado_Oferta' => $valores['nEstado_Oferta'],
					    'nTipo_Oferta' => $valores['nTipo_Oferta'],
					    'categoria_id' => $categoria[0]->categoria_id, 
		 			    'servicio_id' => $valores['servicio_id'],
					    'monedas_id' => $valores['monedas_id'] 
					);
					
		Oferta::where('id','=',$valores['oferta_id']) 
				->update($data);

		$data = null;
		$categoria = null;

		// 

		$detalles = OfertaDetalle::where('ofertas_id','=',$valores['oferta_id'])->delete();

		$detalles = null;

		for ($i=0; $i < count($valores['descripcion_detalle']); $i++) { 
			
			$oferta_detalle = new OfertaDetalle();

			$oferta_detalle->descripcion_detalle = $valores['descripcion_detalle'][$i];
			$oferta_detalle->ofertas_id = $valores['oferta_id'];

			$oferta_detalle->save();

			$oferta_detalle = null;
		}

    	return true;

    }

    public static function RegistrarOferta(array $valores,  $prov_razon_social, $id, &$codigo_generado)
    {

		$categoria = Servicio::listar_codigo_servicio($valores['servicio_id']);	
		$codigo_generado = DB::table('ofertas')->insertGetId(
     			[
     				'titulo_oferta' => $valores['titulo_oferta'], 
     				'precio_oferta' => $valores['precio_oferta'],
     				'precio_real' => $valores['precio_real'],
     				'descuento' => $valores['precio_real'] - $valores['precio_oferta'],
     				'fecha_inicio' => date_create($valores['fecha_inicio'])->format('Y-m-d H:i:s'),
     				'fecha_termino' => date_create($valores['fecha_termino'])->format('Y-m-d H:i:s'),
		 			'calificacion_oferta'=> 'A',
		 			'total_comentarios'=> 0,
		 			'prov_razon_social'=> $prov_razon_social,
		 			'user_id'=> $id,
		 			'nEstado_Oferta'=> 1, // 1:VIGENTES ; 2:CERRADA ; 3: ANULADA.
		 			'nTipo_Oferta' => $valores['nTipo_Oferta'],
		 			'nEstado' =>  1,
		 			'categoria_id' => $categoria[0]->categoria_id, 
		 			'servicio_id' => $valores['servicio_id'],
		 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
		 			'updated_at' =>  date_create()->format('Y-m-d H:i:s'),
		 			'monedas_id' => $valores['monedas_id']   				
     			]
		 	);

		for ($i=0; $i < count($valores['descripcion_detalle']); $i++) { 
			
			$oferta_detalle = new OfertaDetalle();

			$oferta_detalle->descripcion_detalle = $valores['descripcion_detalle'][$i];
			$oferta_detalle->ofertas_id = $codigo_generado;

			$oferta_detalle->save();

			$oferta_detalle = null;
		}

    	return true;

    }

    public static function Devuelve_Precio_Oferta($codigo_oferta)
    {

	return Oferta::select(DB::raw("round(ofertas.precio_oferta,2) as precio_oferta"))
	                            ->where('ofertas.id',$codigo_oferta)
	                            ->where('ofertas.nEstado_Oferta',1)
	                            ->get();

    }

    public static function  Actualiza_Estado_Oferta_Privada($codigo_oferta)
    {

    	$oferta_privada = OfertaPrivada::select('ofertas_privadas.id')
    									 ->where('ofertas_privadas.ofertas_id',$codigo_oferta)
    									 ->get();

    	if (COUNT($oferta_privada) == 1) {
    		
    		$data = array('nEstado_Oferta'=>2);

    		Oferta::where('id',$codigo_oferta)
    				->update($data);

			$data = null;
			$oferta_privada = null;    		

    	}
    }

}
