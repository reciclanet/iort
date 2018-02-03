<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nombre' => 'required',
          'apellido_1' => 'required',
          'apellido_2' => 'nullable',
          'fecha_nacimiento' => 'nullable|date',
          'email' => 'nullable|email',
          'pagina_web' => 'nullable|url',
        ];
    }
}
