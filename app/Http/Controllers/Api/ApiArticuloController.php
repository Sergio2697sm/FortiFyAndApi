<?php

namespace App\Http\Controllers\Api;
use App\Models\articulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = articulo::get();
        return $articulos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new articulo();

        $articulo->Nombre = $request->Articulo["Nombre"];
        $articulo->precio = $request->Articulo["Precio"];
        $articulo->existencias = $request->Articulo["Existencias"];
        $articulo->tipo = $request->Articulo["Tipo"];
        $articulo->activo = $request->Articulo["Activo"];

        $articulo->save();

        return $articulo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $articulo = articulo::find($id);

        if ($articulo) {
            $articulo->Nombre = $request->Articulo["Nombre"];
            $articulo->precio = $request->Articulo["Precio"];
            $articulo->existencias = $request->Articulo["Existencias"];
            $articulo->tipo = $request->Articulo["Tipo"];
            $articulo->activo = $request->Articulo["Activo"];
            $articulo->save();

            return $articulo;
        }

        return "Articulo no encontrado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = articulo::find($id);

        if($articulo) {
            $articulo->delete();
            return "Articulo borrado correctamente";
        }

        return "Articulo no encontrado";
    }
}
