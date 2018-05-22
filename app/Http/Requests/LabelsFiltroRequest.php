<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabelsFiltroRequest extends FormRequest
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
          'codigo_desde' => 'nullable|integer',
          'codigo_hasta' => 'nullable|integer',
          'colaborador' => 'nullable',
          'fecha_desde' => 'nullable|date',
          'fecha_hasta' => 'nullable|date',
          'lote.*.id' => 'distinct|integer'
        ];
    }
}
