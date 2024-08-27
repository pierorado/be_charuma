<?php

namespace App\Http\Controllers;

use App\Http\Requests\Animal\StoreRequest;
use App\Http\Requests\Animal\UpdateRequest;
use App\Models\Animal;
use App\Models\Raza;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animales = Animal::with('raza')->paginate(10);
        return Inertia::render('Animales/Index',[
            'animales' => $animales
        ]);
    }
      /**
     * Show the form for creatin a new resource
     */
    public function create()
    {
        $razas = Raza::all();
        return Inertia::render('Animales/Create', [
            'razas' => $razas,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Animal::create($data)->all();
        return to_route('animales.create');


    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        $animal->load('raza'); // Carga la relación raza
        $formattedFecha = \Carbon\Carbon::parse($animal->fecha)->format('d-m-Y');
        return Inertia::render('Animales/Show', [
        'animal' => $animal,
        'razas' => $animal->razas,
        'formatted_fecha' => $formattedFecha,
    ]);
    }
     /**
     * Show the form for editing the specifield resource
     */
    public function edit($id_animal)
    {
        $animal = Animal::findOrFail($id_animal);
        $razas = Raza::all();
        return Inertia::render('Animales/Edit', [
            'animal' => $animal,
            'razas' => $razas,
        ]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Animal $id_animal)
    {
        $data = $request->validated();
        $id_animal->update($data);

        return to_route('animales.edit', $id_animal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $id_animal)
    {
        $id_animal->delete();
        return to_route('animales.index', $id_animal);
    }
}

