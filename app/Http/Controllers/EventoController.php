<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Eventos = \App\Models\Eventos::all();
        return view('welcome', compact('Eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //obtenemos el campo file definido en el formulario
        $file = $request->file('Imagen');

        if ($request->hasFile('Imagen')) {
            $file           = $request->file("Imagen");

            $nombrearchivo  = $file->getClientOriginalName();
            $public_path = public_path();
            $file->move($public_path . '/storage/', $nombrearchivo);
            $EventoNuevo = new \App\Models\Eventos;
            $EventoNuevo->idRestaurante = $request->idRestaurante;
            $EventoNuevo->Imagen = $nombrearchivo;
            $EventoNuevo->Fecha = $request->Fecha;
            $EventoNuevo->NombreEvento = $request->NombreEvento;
            $EventoNuevo->Descripcion = $request->Descripcion;
            $EventoNuevo->State = true;
            $EventoNuevo->save();
            return back()->with('mensaje', 'Se guardo');
        } else {
            return back()->with('mensaje', 'no hay imagen');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function VerDemo($id)
    {

          $EventoDemo = \App\Models\Eventos::find($id);

          return view('Demos', compact('EventoDemo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$fecha)
    {
        //
        $Encontrar=DB::table('eventos')
        ->where('eventos.idRestaurante', '=', $id)
        ->where('eventos.Fecha', '=', $fecha)
        ->get();
        return $Encontrar;
    }

    public function showAllEvent($id)
    {
        //
        $Encontrar=DB::table('eventos')
        ->where('eventos.idRestaurante', '=', $id)
        ->get();
        return $Encontrar;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $EventoActualizar = \App\Models\Eventos::find($id);

        return view('Editar', compact('EventoActualizar'));
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
        //
        $EventoActualizar = \App\Models\Eventos::find($id);

        //obtenemos el campo file definido en el formulario
        $file = $request->file('Imagen');

        if ($request->hasFile('Imagen')) {
            $file= $request->file("Imagen");
            //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
            $nombrearchivo  = $file->getClientOriginalName();
            $public_path = public_path();
            $file->move($public_path . '/storage/', $nombrearchivo);
            $EventoActualizar->idRestaurante = $request->idRestaurante;
            $EventoActualizar->Imagen = $nombrearchivo;
            $EventoActualizar->Fecha = $request->Fecha;
            $EventoActualizar->NombreEvento = $request->NombreEvento;
            $EventoActualizar->Descripcion = $request->Descripcion;
            $EventoActualizar->State = true;
            $EventoActualizar->save();
            return back()->with('mensaje', 'Evento Actualizado');
        } else {
            return back()->with('mensajeErr', 'no hay imagen');
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
        $EventoEliminar = \App\Models\Eventos::find($id);
        $nombrearchivoEliminar = $EventoEliminar->Imagen;
        Storage::delete($nombrearchivoEliminar);
        $EventoEliminar = DB::table('eventos')
            ->where('eventos.id', '=', $id)
            ->delete();

        return back()->with('mensaje', 'Evento eliminado');
    }
}
