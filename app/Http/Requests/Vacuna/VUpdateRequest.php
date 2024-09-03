<?php

namespace App\Http\Requests\Vacuna;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class VUpdateRequest extends FormRequest
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
            "nombre_vacuna" => 'required',
            "Fecha_administrada" => 'required',
            "Fecha_programada" => 'required',
            "animal_id" => 'required',
        ];
    }
}
