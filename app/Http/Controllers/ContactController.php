<?php

namespace App\Http\Controllers;
use App\Models\contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $respuesta = [
            'mensaje' => 'envio respuesta del backend Erick',
            'datos_recibidos' => $request->all()
        ];
        return response()->json($respuesta);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {     
        // return $request->mensaje;
            $Contact = new Contact();
            $Contact->Nombre = $request->name;
            $Contact->Correo_Electronico = $request->email;
            $Contact->Mensaje = $request->message;
    
            $Contact->save(); 

            $respuesta=[
                'mensaje'=>'envio respuesta del backend',
                'status'=>200
            ];

            return response()->json($respuesta);
    
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
