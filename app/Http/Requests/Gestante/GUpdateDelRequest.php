<?php

namespace App\Http\Requests\Gestante;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class GUpdateDelRequest extends FormRequest
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
            "Fecha_prenez" => 'required',
            "Fecha_estimada" => 'required',
            "Fecha_parto" => 'required',
            "animal_id" => 'required',
            "crias" => 'required|max:2',
        ];
    }
}
