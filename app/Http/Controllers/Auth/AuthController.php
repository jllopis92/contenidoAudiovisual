<?php

namespace contenidoAudiovisual\Http\Controllers\Auth;

use contenidoAudiovisual\User;
use contenidoAudiovisual\Notification;
use Validator;
use contenidoAudiovisual\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|recaptcha',
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
        if($data['isFromCine'] == 1){
            $users = User::all();
           foreach($users as $administrador){
                if($administrador->tipo == "administrador") {
                    $notif = Notification::create([
                        'user_name' => $data['name'],
                        'send_to' => $administrador->id,
                        'reason' => $data['userRol'],
                    ]);
                }
           }
        }
        $city = null;
        if(! empty($data['city'])){
            $city = $data['city'];
        }
        
        return $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'zone' => $data['zone'],
            'country' => $data['country'],
            'region' => $data['city_state'],
            'city' => $city,
            'birthday' => $data['birthday'],
            'tipo' => $data['tipo'],
            'year' => $data['year'],
        ]);
    }

    /*protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required','g-recaptcha-response' => 'required|recaptcha',
        ]);
    }*/

}
