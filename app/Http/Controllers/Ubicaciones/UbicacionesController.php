<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UbicacionesController extends Controller
{
    public function index()
    {
                // Consultas
                /*
                $marcas = cvv_marca::all();
                $modelos = cvv_modelo::all();
                $camaras = cvv_camara::all();
                $areas = area::all();
                $sitios = sitio::all();
                
                // Codificación para no mostrar los valores
                $marcasEncoded = json_encode($marcas);
                $modelosEncoded = json_encode($modelos);
                $camarasEncoded = json_encode($camaras->load('modelo.marca'));
                $areasEncoded = json_encode($areas);
                $sitiosEncoded = json_encode($sitios);

                
                return view('camaras', [
                    'marcas' => $marcasEncoded,
                    'modelos' => $modelosEncoded,
                    'camaras' => $camarasEncoded,
                    'areas' => $areasEncoded,
                    'sitios' => $sitiosEncoded,
                ]);
                */

                return view('ubicaciones');

    }
}
