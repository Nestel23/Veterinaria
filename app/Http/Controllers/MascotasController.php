<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Propietarios;

class MascotasController extends Controller
{
   
    public function index()
    {
        $propietarios = Propietarios::All();

        $mascotas = Mascotas::select('mascotas.id', 'mascotas.nombre', 'mascotas.edad', 'mascotas.idPropietario','propietarios.nombre as Npropietario', 'propietarios.apellido as Apropietario')->join('propietarios', 'propietarios.id', '=', 'mascotas.idPropietario')->get();

        return view('mascotas', compact('mascotas', 'propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
       $mascota = new Mascotas($request->input());
       $mascota->saveOrfail();
       return redirect('mascotas');
    }

    
    public function show(string $id)
    {
        $mascota = Mascotas::find($id);
        $propietarios = Propietarios::All();
        return view('editMascotas', compact('mascota', 'propietarios'));
        
    }

    public function edit(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {

        $mascota = Mascotas::find($id);
        $mascota->fill($request->input())->saveOrfail();
        return redirect('mascotas');
        
    }

    
    public function destroy(string $id)
    {
        $mascota = Mascotas::find($id);
        $mascota->delete();
        return redirect('mascotas');
        
    }
}
