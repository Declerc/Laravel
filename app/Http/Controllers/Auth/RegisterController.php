<?php

namespace App\Http\Controllers\Auth;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected static function num_adherent(){
    $result = User::select('*')
                ->where("t_e_adherent_adh.adh_numadherent", '>=', "t_e_adherent_adh.adh_numadherent")
                ->orderby("t_e_adherent_adh.adh_numadherent","desc");

        foreach ($result as $key => $value) {
            foreach ($result[$key] as $key => $value) {
                if ($key === "adh_numadherent") {
                    return $value;
                }
            }
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'adh_numadherent' => 'string',
            'adh_datefinadhesion' => 'string',
            'adh_mel' => 'required|string|email|max:255|unique:t_e_adherent_adh',
            'adh_motpasse' => 'required|string|min:3|confirmed',
            'adh_pseudo' => 'required|string|max:255',
            'adh_civilite' => 'required|string',
            'adh_nom' => 'required|string|max:255',
            'adh_prenom' => 'required|string|max:255',
            'adh_telfixe' => 'string|max:10',
            'adh_telportable' => 'string|max:10',
        ]);
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
            'adh_numadherent' => $data['adh_numadherent'],
            'adh_datefinadhesion' => date("Y-m-d"),
            'adh_mel' => $data['adh_mel'],
            'adh_motpasse' => bcrypt($data['adh_motpasse']),
            'adh_pseudo' => $data['adh_pseudo'],
            'adh_civilite' => $data['adh_civilite'],
            'adh_nom' => $data['adh_nom'],
            'adh_prenom' => $data['adh_prenom'],
            'adh_telfixe' => $data['adh_telfixe'],
            'adh_telportable' => $data['adh_telportable'],
        ]);
    }



}
