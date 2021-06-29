<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use App\Models\Clientes;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'apellido' => ['required', 'string', 'max:100'],
            'edad' => ['required', 'int', 'max:110', 'min:1'],
            'celular' => ['required','digits:9'],
            'dni' => ['required','digits:8','numeric', 'unique:clientes'],
            'fecha_nac' => ['required'],
            'sexo' => ['required'],
            'domicilio' => ['required', 'string', 'max:100'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'apellido' => $input['apellido'],
            'celular' => $input['celular'],
            'dni' => $input['dni'],
            'fecha_nac' => $input['fecha_nac'],
            'edad' => $input['edad'],
            'sexo' => $input['sexo'],
            'domicilio' => $input['dni'],
            'password' => Hash::make($input['password']),
        ]);

        return $user;
    }
}
