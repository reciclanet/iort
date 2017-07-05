<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarOrganizacionRequest extends FormRequest
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
          'razon_social' => 'required',
          'email' => 'nullable|email',
          'pagina_web' => 'nullable|url',
          'logo_file'       => 'nullable|mimes:jpg,jpeg,png',
        ];
    }
}
