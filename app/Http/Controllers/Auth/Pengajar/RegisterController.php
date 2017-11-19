<?php

namespace App\Http\Controllers\Auth\Pengajar;

use App\User;
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
    public function showRegistrationForm()
    {
        return view('auth.pengajar.register');
    }
    protected function guard()
    {
        return Auth::guard('web_pengajar');
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/diskusi';

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
        return Validator::make($data, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengajars',
            'password' => 'required|string|min:6|confirmed',
            'no_telp' => 'required|max:15',
            'no_ktp' => 'required|min:10|unique:pengajars',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'gender' => 'required',
            'pendidikan_terakhir' => 'required',
            'tarif' => 'required',
            'kecamatan_id' => 'required',
            'kabupaten_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $request)
    {
        $request = (object) $request;
        $bio = 'placeholder biography';
        $path = 'placeholder image';
        if($request->hasFile('foto')){
            $this->validate($request, [
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/pengajar');
        }
        return User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $path,
            'no_telp' => $request->no_telp,
            'no_ktp' => $request->no_ktp,
            'alamat' => $request->alamat,
            'bio' => $request->bio ?: $bio,
            'gender' => $request->gender,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'tarif' => $request->tarif,
            'kecamatan_id' => $request->kecamatan_id,
            'kabupaten_id' => $request->kabupaten_id,
        ]);
    }
}
