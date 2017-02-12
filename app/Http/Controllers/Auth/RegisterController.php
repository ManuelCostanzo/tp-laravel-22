<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $locations = Location::all();
        return view("auth.register", compact("locations"));
    }

    public function register(\Illuminate\Http\Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        return view('auth/success');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nick' => 'required|min:5|max:15|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'document' => 'required|numeric|unique:users',
            'phone' => 'required|numeric',
            'location_id' => 'required|exists:locations,id',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nick' => $data['nick'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'name' => $data['name'],
            'surname' => $data['surname'],
            'document' => $data['document'],
            'phone' => $data['phone'],
            'location_id' => $data['location_id'],
        ]);
    }
}
