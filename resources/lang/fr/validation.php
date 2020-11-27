<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ': l\'attribut doit être accepté.',
    'active_url'           => ': l\'attribut n\'est pas une adresse Internet valide.',
    'after'                => 'L\'attribut: doit être une date postérieure à la date:.',
    'alpha'                => ': l\'attribut ne peut être composé que de lettres.',
    'alpha_dash'           => ': l\'attribut ne peut être composé que de lettres, de chiffres, de tirets et de traits de soulignement. Les trémas (ä, ö, ü) et eszett (ß) ne sont pas autorisés.',
    'alpha_num'            => ':l\'attribut ne peut être composé que de lettres et de chiffres.',
    'array'                => ':L\'attribut doit être un tableau.',
    'before'               => ':l\'attribut doit être une date antérieure au: date.',
    'between'              => [
        'numeric' => ': l\'attribut doit être compris entre: min et: max.',
        'file'    => 'L\'attribut: doit être compris entre: min et: max kilo-octets.',
        'string'  => ': l\'attribut doit être compris entre: min et: max caractères.',
        'array'   => 'L\'attribut: doit avoir entre les éléments: min &: max.',
    ],
    'boolean'              => ": l\'attribut doit être «vrai» ou «faux».",
    'confirmed'            => ': l\'attribut ne correspond pas à la confirmation.',
    'date'                 => ': l\'attribut doit être une date valide.',
    'date_format'          => 'L\'attribut: ne correspond pas au format valide pour: format.',
    'different'            => ': attribut et: autre doivent être différents.',
    'digits'               => ': l\'attribut doit avoir: chiffres chiffres.',
    'digits_between'       => ': l\'attribut doit avoir entre: min et: max chiffres.',
    'distinct'             => 'Le champ: attribut a une valeur en double.',
    'email'                => ': le format d\'attribut n\'est pas valide.',
    'exists'               => 'La valeur sélectionnée pour: attribut n\'est pas valide.',
    'filled'               => ': l\'attribut doit être rempli.',
    'image'                => ': l\'attribut doit être une image.',
    'in'                   => 'La valeur sélectionnée pour: attribut n\'est pas valide.',
    'in_array'             => 'Le champ: attribut n\'existe pas dans: autre.',
    'integer'              => ': l\'attribut doit être un entier.',
    'ip'                   => ': l\'attribut doit être une adresse IP valide.',
    'json'                 => ': l\'attribut doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => ': l\'attribut peut être au maximum: max.',
        'file'    => ': l\'attribut peut être au maximum: kilo-octets maximum.',
        'string'  => ': l\'attribut peut avoir un maximum de: max caractères.',
        'array'   => ': l\'attribut ne doit pas avoir plus de: max éléments.',
    ],
    'mimes'                => 'L\'attribut: doit être du type de fichier: valeurs.',
    'min'                  => [
        'numeric' => ': l\'attribut doit être au moins: min.',
        'file'    => ': l\'attribut doit avoir une taille d\'au moins: min kilo-octets.',
        'string'  => ': l\'attribut doit contenir au moins: min caractères.',
        'array'   => ': l\'attribut doit avoir au moins: éléments min.',
    ],
    'not_in'               => 'La valeur sélectionnée pour: attribut n\'est pas valide.',
    'numeric'              => ': l\'attribut doit être un nombre.',
    'present'              => 'Le champ: attribut doit être présent.',
    'regex'                => ': le format d\'attribut n\'est pas valide.',
    'required'             => ': l\'attribut doit être rempli.',
    'required_if'          => ': l\'attribut doit être renseigné si: autre est: valeur.',
    'required_unless'      => ': l\'attribut doit être renseigné si: autre n\'est pas: valeurs.',
    'required_with'        => 'L\'attribut: doit être spécifié si: values ​​a été renseigné.',
    'required_with_all'    => 'L\'attribut: doit être spécifié si: values ​​a été renseigné.',
    'required_without'     => 'L\'attribut: doit être spécifié si: values ​​n\'a pas été renseigné.',
    'required_without_all' => 'L\'attribut: doit être spécifié si aucun des champs: values ​​n\'a été rempli.',
    'same'                 => ': attribut et: autre doivent correspondre.',
    'size'                 => [
        'numeric' => ': l\'attribut doit être égal à: size.',
        'file'    => 'L\'attribut: doit être: size kilo-octets.',
        'string'  => ': l\'attribut doit être: size caractères longs.',
        'array'   => 'L\'attribut: doit avoir exactement les éléments: size.',
    ],
    'string'               => ': l\'attribut doit être une chaîne.',
    'timezone'             => ': l\'attribut doit être un fuseau horaire valide.',
    'unique'               => ': l\'attribut est déjà pris.',
    'url'                  => 'Le format de: attribut n\'est pas valide.',

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

    'custom'               => [
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

    'attributes' => [
        //
    ],


    'welcome' => 'Bienvenue sur notre application',

];