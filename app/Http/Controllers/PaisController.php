<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaisCollection;
use App\Http\Resources\PaisResource;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index(): PaisCollection
    {
        $paises = Pais::all();

        return PaisCollection::make($paises);
    }

    public function show(Pais $pais): PaisResource
    {
        return PaisResource::make($pais);
    }

    public function store(Request $request): PaisResource
    {
        $pais = Pais::create([
            'nombre' => $request->input('data.nombre'),
        ]);

        return PaisResource::make($pais);
    }

    public function update(Pais $pais, Request $request): PaisResource
    {
        $paisData = $request->input('nombre');
        
        $pais->update([
            'nombre' => $paisData
        ]);

        return PaisResource::make($pais);
    }
}
