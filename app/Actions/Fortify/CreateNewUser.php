<?php

namespace App\Actions\Fortify;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'country' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
            'address' => ['required'],


        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Address::create([
                'user_id' => $user->id,
            'name' => $input['name'],
            'mail' => $input['email'],
            'country' => $input['country'],
            'city' => $input['city'],
            'address' => $input['address'],
            'postcode' => $input['postcode']
        ]);

        return $user;
    }
}
