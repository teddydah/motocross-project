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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required'],
            'license_number' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
            'birth_date' => ['required', 'date'],
            'address' => ['required', 'string'],
            'zip_code' => ['required', 'string'],
            'city' => ['required', 'string'],
        ])->validate();

        return User::create([
            'lastname' => $input['lastname'],
            'firstname' => $input['firstname'],
            'email' => $input['email'],
            'role' => $input['role'],
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
