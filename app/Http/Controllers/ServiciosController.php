<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Servicio;

class ServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $nombre_cliente = $request->input('nombre_cliente');
        $estado = $request->input('estado');
        $fechaCreado = $request->input('created_at');
        $servicio = $request->input('servicio');

        $servicios = array();

        if($nombre_cliente)
        {
            $servicios = Servicio::where('nombre_cliente','LIKE','%'.$nombre_cliente.'%')->get();
        }

        else if($estado)
        {
            $servicios = Servicio::where('estado','LIKE','%'.$estado.'%')->get();
        }

        else if($fechaCreado)
        {
            $servicios = Servicio::where('created_at','LIKE','%'.$fechaCreado.'%')->get();
        }

        else if($servicio)
        {
            $servicios = Servicio::where('servicio','LIKE','%'.$servicio.'%')->get();
        }
        else 
        {
            $servicios = Servicio::all();
        }

        $argumentos = array();
        $argumentos['servicios'] = $servicios;

        return view('servicios.index', $argumentos);
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

        if ($servicio->save()) {

            return redirect()->route('servicios.index')->with('exito', '¡se a guardado!');
        }
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
            return view('servicios.show', $argumentos);
        }
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio = Servicio::find($id);

        if($servicio){

            $argumentos = array();
            $argumentos['servicio'] = $servicio;
            return view('servicios.edit', $argumentos);

        } 
        return redirect()->route('servicios.index')->with('error', 'No se encontro');
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

            if ($request->hasFile('foto')) {

                $archivoPortada = $request->file('foto');
                $rutaArchivo = $archivoPortada->store('public\assets\img\imgServicios');
                $rutaArchivo = substr($rutaArchivo, 30);
                $servicio->foto = $rutaArchivo;
    
            }
                
            if($servicio->save()){
                return redirect()->route('servicios.edit', $id)->with('exito', 'Se actualizo exitosamente');

            }
            return redirect()->route('servicios.edit', $id)->with('error', 'No se pudo actualizar ');
        }
        return redirect()->route('servicios.index')->with('error', 'No se encontro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        if($servicio){

            if($servicio->delete()){
                return redirect()->route('servicios.index')->with('exito', '¡eliminada exitosamente!');
            }
            return redirect()->route('servicios.index')->with('error', 'No se puedo eliminar');
        }
        return redirect()->route('servicios.index')->with('error', 'No se encontró');
    }
}
