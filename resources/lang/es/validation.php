<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser posterior a :date.',
    'after_or_equal'       => ':attribute debe ser posterior o igual a :date.',
    'alpha'                => ':attribute sólo puede contener letras.',
    'alpha_dash'           => ':attribute sólo puede contener letras, números y guiones.',
    'alpha_num'            => ':attribute sólo puede contener letras y números.',
    'array'                => ':attribute debe ser un array.',
    'before'               => ':attribute debe ser anterior a :date.',
    'before_or_equal'      => ':attribute debe ser anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute debe estar entre :min y :max.',
        'file'    => ':attribute debe estar entre :min y :max kilobytes.',
        'string'  => ':attribute debe estar entre :min y :max carácteres.',
        'array'   => ':attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'              => ':attribute tiene que ser verdadero o falso.',
    'confirmed'            => ':attribute no coincide la confirmación.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no coincide con el formato :format.',
    'different'            => ':attribute y :other deben ser distintos.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => ':attribute tiene dimensiones de imagen no válidas.',
    'distinct'             => 'El campo :attribute tiene valores duplicados.',
    'email'                => ':attribute debe ser una dirección de email válida.',
    'exists'               => 'El :attribute seleccionado no es válido.',
    'file'                 => ':attribute debe ser un fichero.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => 'El :attribute seleccionado es inválido.',
    'in_array'             => ':attribute no existe en :other.',
    'integer'              => ':attribute debe ser un entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => ':attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor de :max kilobytes.',
        'string'  => ':attribute no debe tener más de :max caracteres.',
        'array'   => ':attribute no debe tener más de  :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un fichero de tipo: :values.',
    'mimetypes'            => ':attribute debe ser un fichero de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute tiene que ser al menos :min.',
        'file'    => ':attribute tiene que tener al menos :min kilobytes.',
        'string'  => ':attribute tiene que tener al menos :min caracteres.',
        'array'   => ':attribute tiene que tener al menos :min elementos.',
    ],
    'not_in'               => 'El :attribute seleccionado no es válido.',
    'numeric'              => ':attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute no es válido.',
    'required'             => 'El atributo :attribute es obligatorio.',
    'required_if'          => ':attribute es obligatorio cuando :other es :value.',
    'required_unless'      => ':attribute es obligatorio salvo que :other esté en :values.',
    'required_with'        => ':attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => ':attribute es obligatorio cuando :values están presentes.',
    'required_without'     => ':attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => ':attribute es obligatorio cuando ninguno de los :values están presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => ':attribute debe tener el tamaño :size.',
        'file'    => ':attribute debe tener :size kilobytes.',
        'string'  => ':attribute debe tener :size caracteres.',
        'array'   => ':attribute debe tener :size elementos.',
    ],
    'string'               => ':attribute debe ser una cadena de caracteres.',
    'timezone'             => ':attribute debe ser una zona horaria válida.',
    'unique'               => ':attribute no está disponible.',
    'uploaded'             => ':attribute fallo en la subida.',
    'url'                  => ':attribute el formato no es válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
