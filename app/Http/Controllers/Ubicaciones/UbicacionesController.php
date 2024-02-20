<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\sub_area;
use App\Models\area;
use App\Models\lugar;


class UbicacionesController extends Controller
{
    public function index()
    {
            
        $lugares = lugar::all();
        $areas = area::all();
        $sub_areas = sub_area::all();
        
        // Codificación para no mostrar los valores
        $lugaresEncoded = json_encode($lugares);
        $areasEncoded = json_encode($areas);
        $sub_areasEncoded = json_encode($sub_areas);
        $ubicacionEncoded = json_encode($sub_areas->load('area.lugar'));
        
        return view('ubicaciones', [
            'lugares' => $lugaresEncoded,
            'areas' => $areasEncoded,
            'sub_areas' => $sub_areasEncoded,
            'ubicacion' => $ubicacionEncoded,
        ]);

    }

    public function set_sub_area(Request $request)
    {
        // Obtener los datos enviados desde la petición POST
        $datos = $request->all();
    
        try{
            $request->validate([
                'new_lugar' => [
                    'required',
                ],
                'new_area' => [
                    'required',
                ],
                'new_sub_area' => [
                    'required',
                    Rule::unique('sub_areas', 'nombre_sub_area'),
                ],
                'new_url_maps' => [
                    'required',
                ],


                // Otras reglas de validación para los demás campos
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            // Si ocurre una excepción de validación, puedes devolver una respuesta JSON de error
            return response()->json([
                'type' => 'warning',
                'message' => 'Registro no realizado',
            ]);
        }

        try{
          
            // Crear una nueva instancia del modelo sub_area
            $sub_area = new sub_area();
            $sub_area->nombre_sub_area = $datos['new_sub_area'];
            $sub_area->area_id = $datos['id_area'];
            $sub_area->descripcion = "";
            $sub_area->ubicacion_maps = $datos['new_url_maps'];
            
            // Guardar la nueva instancia en la base de datos
            $sub_area->save();

        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['type' => 'error', 
            'message' => 'Hubo algún error',
           ]);
        }
        // Recuperar la instancia guardada con los datos de sus tablas secundarias
        $ultimaSub_area = sub_area::with('area.lugar')->latest()->first();  
        // Retornar la respuesta con los valores necesarios para pintar en la tabla
        return response()->json(['type' => 'success', 
                                 'message' => 'Subarea insertada correctamente',
                                 'area' => $ultimaSub_area['area']['nombre_area'],
                                 'lugar' => $ultimaSub_area['area']['lugar']['nombre_lugar'],
                                 'sub_area' => $ultimaSub_area['nombre_sub_area'],
                                 'ubicacion_maps' => $ultimaSub_area['ubicacion_maps'],
                                ]);
    }

}
