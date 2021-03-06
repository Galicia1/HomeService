<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Servicio;

class apiServicioApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        $fechaInicio = $request->input('created_at');
        $fechaFin = $request->input('updated_at');

        if($fechaInicio && $fechaFin)
        {
            $servicios = Servicio::where('created_at','>=',$fechaInicio)->where('created_at','<=',$fechaFin)->get();

        }

        else
        {
            $servicios = Servicio::all();
        }
        return $servicios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $servicio = new Servicio();
        $servicio->id_user = $request->user()->id;
        $servicio->nombre_cliente = $request->input('nombre_cliente');
        $servicio->servicio = $request->input('servicio');
        $servicio->telefono = $request->input('telefono');
        $servicio->estado = $request->input('estado');
        $servicio->foto_resultado = $request->input('foto_resultado');
        $servicio->direccion = $request->input('direccion');
        $servicio->created_at = $request->input('created_at');
        $servicio->updated_at = $request->input('updated_at');
        


        if ($request->hasFile('foto_resultado')) {

            $archivoPortada = $request->file('foto_resultado');
            $rutaArchivo = $archivoPortada->store('public\assets\img\imgServicios');
            $rutaArchivo = substr($rutaArchivo, 30);
            $servicio->foto = $rutaArchivo;

        }

        $argumentos = array();
        $argumentos['exito'] = false;
        if($servicio -> save()){
            $argumentos['exito'] = true;

        }    
        return $argumentos;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);

        if($servicio)
        {
            $argumentos = array();
            $argumentos['servicio'] = $servicio;
            return view('servicio.show', $argumentos);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        if($servicio){
            $servicio->id_user = $request->user()->id;
            $servicio->nombre_cliente = $request->input('nombre_cliente');
            $servicio->servicio = $request->input('servicio');
            $servicio->telefono = $request->input('telefono');
            $servicio->estado = $request->input('estado');
            $servicio->foto_resultado = $request->input('foto_resultado');
            $servicio->direccion = $request->input('direccion');
            $servicio->created_at = $request->input('created_at');
            $servicio->updated_at = $request->input('updated_at');

            if ($request->hasFile('foto_resultado')) {

                $archivoPortada = $request->file('foto_resultado');
                $rutaArchivo = $archivoPortada->store('public\assets\img\imgServicios');
                $rutaArchivo = substr($rutaArchivo, 30);
                $servicio->foto_resultado = $rutaArchivo;
    
            }

            $argumentos = array();
            $argumentos['exito'] = false;
            if($servicio -> save()){
                $argumentos['exito'] = true;
    
            }    
            return $argumentos;    
                
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}
