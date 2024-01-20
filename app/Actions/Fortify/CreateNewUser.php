<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     */
    public function create(array $input): User
    {
        $rules = [
            'lastname' => ['required', 'max:255'],
            'firstname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'license_number' => ['nullable', 'numeric'],
            'phone' => ['nullable', 'size:10'],
            'birth_date' => ['required', 'date'],
            'address' => 'nullable',
            'zip_code' => ['nullable', 'size:5'],
            'city' => 'nullable',
        ];

        $messages = [
            'phone' => 'Le numéro de téléphone doit comporté 10 chiffres.',
            'zip_code' => 'Le code postal doit comporté 5 chiffres.'
        ];

        Validator::make($input, $rules, $messages)->validate();

        return User::create([
            'lastname' => $input['lastname'],
            'firstname' => $input['firstname'],
            'email' => $input['email'],
            'license_number' => $input['license_number'],
            'phone' => $input['phone'],
            'birth_date' => $input['birth_date'],
            'address' => $input['address'],
            'zip_code' => $input['zip_code'],
            'city' => $input['city'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
