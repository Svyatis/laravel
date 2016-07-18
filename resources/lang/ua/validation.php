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

    'accepted'             => ':attribute має бути прийнято.',
    'active_url'           => ':attribute не правильна адреса.',
    'after'                => ':attribute має бути датою після :date.',
    'alpha'                => ':attribute має містити тільки букви.',
    'alpha_dash'           => ':attribute має містити тільки букви, цифри, та підкреслення.',
    'alpha_num'            => ':attribute має містити тільки букви та цифри.',
    'array'                => ':attribute має бути масивом.',
    'before'               => ':attribute має бути датою перед :date.',
    'between'              => [
        'numeric' => ':attribute має бути між :min та :max.',
        'file'    => ':attribute має бути від :min до :max кілобайт.',
        'string'  => ':attribute має бути від :min до :max символів.',
        'array'   => ':attribute має містити від :min до :max елементів.',
    ],
    'boolean'              => 'Поле :attribute має бути правда або ні.',
    'confirmed'            => ':attribute не підтверджено.',
    'date'                 => ':attribute не вірна дата.',
    'date_format'          => ':attribute не збігається з форматом :format.',
    'different'            => ':attribute та :other повинні бути різні.',
    'digits'               => ':attribute має бути :digits цифри.',
    'digits_between'       => ':attribute повинні бути між :min та :max цифрами.',
    'distinct'             => 'Поле :attribute має дублікат.',
    'email'                => ':attribute має бути адресою електронної пошти.',
    'exists'               => 'Вибрано :attribute неправильно.',
    'filled'               => 'Поле :attribute обов\'язкове.',
    'image'                => ':attribute має бути картинкою.',
    'in'                   => 'ВИбрано :attribute неправильно.',
    'in_array'             => 'Поле :attribute не існує в :other.',
    'integer'              => ':attribute має бути цілим числом.',
    'ip'                   => ':attribute має бути IP адресою.',
    'json'                 => ':attribute має бути строкою JSON.',
    'max'                  => [
        'numeric' => ':attribute не може бути більше :max.',
        'file'    => ':attribute не може бути більше :max кілобайт.',
        'string'  => ':attribute не може бути більше  :max символів.',
        'array'   => ':attribute не може бути більше :max елементів.',
    ],
    'mimes'                => ':attribute повинно бути файлом типу: :values.',
    'min'                  => [
        'numeric' => ':attribute має бути не менше :min.',
        'file'    => ':attribute має бути не менше :min кілобайт.',
        'string'  => ':attribute має бути не менше :min символів.',
        'array'   => ':attribute має бути не менше :min елементів.',
    ],
    'not_in'               => 'Вибраний :attribute неправильний.',
    'numeric'              => ':attribute має бути номером.',
    'present'              => 'Поле :attribute має бути представлене.',
    'regex'                => ':attribute формат неправильний.',
    'required'             => 'Поле :attribute обов\'язкове.',
    'required_if'          => 'Поле :attribute обов\'язкове, якщо :other є :value.',
    'required_unless'      => 'Поле :attribute обов\'язкове поки :other є в :values.',
    'required_with'        => 'Поле :attribute обов\'язкове коли :values представлене.',
    'required_with_all'    => 'Поле :attribute обов\'язкове коли :values представлене.',
    'required_without'     => 'Поле :attribute обов\'язкове коли :values не представлене.',
    'required_without_all' => 'Поле :attribute обов\'язкове коли ні один з :values не представлені.',
    'same'                 => ':attribute та :other повинні збігатись.',
    'size'                 => [
        'numeric' => ':attribute має бути розміром :size.',
        'file'    => ':attribute має бути розміром :size кілобайт.',
        'string'  => ':attribute має бути розміром :size символів.',
        'array'   => ':attribute повинен містити :size елементів.',
    ],
    'string'               => ':attribute має бути строкою.',
    'timezone'             => ':attribute має бути дійсною зоною.',
    'unique'               => ':attribute вже існує.',
    'url'                  => ':attribute формат не правильний.',

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
