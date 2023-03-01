<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietarios;

class PropietariosController extends Controller
{
    
    public function index()
    {
        $propietarios = Propietarios::All();
        return view('propietarios', compact('propietarios'));
        
    }

   
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
       $propietario = new Propietarios($request->input());
       $propietario->saveOrfail();
       return redirect('propietarios');
    }

    
    public function show(string $id)
    {
        $propietario = Propietarios::find($id);
        return view('editPropietarios', compact('propietario'));
    }

   
    public function edit(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {
        $propietario = Propietarios::find($id);
        $propietario->fill($request->input())->saveOrfail();
        return redirect('propietarios');
        
    }

   
    public function destroy(string $id)
    {
        $propietario = Propietarios::find($id);
        $propietario->delete();
        return redirect('propietarios');

        
    }
}
