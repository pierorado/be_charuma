<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Animal;
use App\Http\Requests\Venta\VStoreRequest;
use App\Http\Requests\Venta\VUpdateRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with('animal')->paginate(10);
        return Inertia::render('Ventas/Index',[
            'ventas' => $ventas
        ]);
    }

      /**
     * Show the form for creatin a new resource
     */
    public function create()
    {
        $animales = Animal::all();
        return Inertia::render('Ventas/Create', [
            'animales' => $animales,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(VStoreRequest $request)
    {
        $data = $request->validated();
        Venta::create($data)->all();
        return to_route('ventas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $Ventas)
    {
        $venta->load('animal'); // Carga la relación raza
        $adminfecha = \Carbon\Carbon::parse($Ventas->Fecha_administrada)->format('d-m-Y');
        $prografecha= \Carbon\Carbon::parse($Ventas->Fecha_programada)->format('d-m-Y');

        return Inertia::render('Ventas/Show', [
        'venta' => $Ventas,
        'animales' => $Ventas->animales,
        'admin_fecha' => $adminfecha,
        'progra_fecha' => $prografecha,
    ]);
    }

    /**
     * Show the form for editing the specifield resource
     */
    public function edit($id_venta)
    {
        $venta = Vacuna::findOrFail($id_venta);
        $animales = Animal::create($data)->all();
        return Inertia::render('Venta/Edit', [
            'venta' => $vacuna,
            'animales' => $animales,
        ]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(VUpdateRequest $request, Vacuna $id_vacuna)
    {
        $data = $request->validated();
        $id_vacuna->update($data);

        return to_route('vacunas.edit', $id_vacuna);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $id_venta)
    {
        $id_venta->delete();
        return to_route('ventas.index', $id_venta);
    }
}
