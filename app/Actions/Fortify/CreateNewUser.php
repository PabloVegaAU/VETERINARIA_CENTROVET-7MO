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
            'dni' => ['required','digits:8','numeric', 'unique:clientes'],
            'fecha_nac' => ['required'],
            'sexo' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Clientes::create([
            'nombre' => $user->name,
            'apellido' => $input['apellido'],
            'dni' => $input['dni'],
            'fecha_nac' => $input['fecha_nac'],
            'edad' => $input['edad'],
            'sexo' => $input['sexo'],
            'user_id' => $user->id,
        ]);

        return $user;
    }
}
