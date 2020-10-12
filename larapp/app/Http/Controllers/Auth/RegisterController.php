<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(session()->get('locale') == 'en') {
            $messages = array(
                'name.required' => 'The "Name" field is required',
                'email.required' => 'The "Email" field is required',
                'phone.required' => 'The "PhoneNumber" field is required',
                'birthdate.required' => 'The "Birthdate" field is required',
                'gender.required' => 'The "Gender" field is required',
                'address.required' => 'The "Address" field is required',
                'password.required' => 'The "Password" field is required',
            );
        }
        else {
            $messages = array(
                'name.required' => 'El campo "Nombre" es requerido',
                'email.required' => 'El campo "Correo Electrónico" es requerido',
                'phone.required' => 'El campo "Número Telefónico" es requerido',
                'birthdate.required' => 'El campo "Fecha de Nacimiento" es requerido',
                'gender.required' => 'El campo "Género" es requerido',
                'address.required' => 'El campo "Dirección" es requerido',
                'password.required' => 'El campo "Contraseña" es requerido',
            );
        }

        return Validator::make($data, [
            'name'  => ['required'],
            'email'     => ['required', 'email', 'unique:users'],
            'phone'     => ['required', 'numeric'],
            'birthdate' => ['required', 'date'],
            'gender'    => ['required'],
            'address'   => ['required',],
            'password'  => ['required', 'min:6', 'confirmed'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
