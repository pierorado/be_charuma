<?php

namespace App\Http\Requests\Animal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           "arete" => 'required|min:4|max:10|unique:animales,arete',
            "ingreso" => 'required|in:Nacimiento,Compra',
            "nombre_animal" => 'required|min:3|max:45',
            "fecha" => 'required',
            "sexo" => 'required|in:Macho,Hembra',
            "raza_id" => 'required',
            "clasificacion" => 'required|in:Vacas,Toros,Terneros,Terneras,Vaquillonas',
            "precio_compra" => 'nullable|max:45',
            "estado" => 'required|in:Activo,Muerto,Vendido',
        ];
    }
}
