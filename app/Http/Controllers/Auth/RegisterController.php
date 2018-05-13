<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Carbon\Carbon;

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
    protected $redirectTo = '/logout';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|email_domain:' . $data['email'] . '|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ],
        [
            'required' => 'This information is required',
            'email.domain' => 'only XJTLU email can be used to register'
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
        $data['activationcode'] = md5($data['name'].time()); 
        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'registration_id' => $data['activationcode'], 
            'active' => false,
        ]);
        $data['id'] = $newUser->id;
        $this->send_validation_email($data);
        return $newUser;
    }

    protected function send_validation_email($data){
        Mail::send('auth.activemail',$data, function($message) use($data){
            $message -> subject("Welcome to Glue");
            $message -> to($data['email'],$data['name']);
            session()->flash('success', 'please check your mailbox to validate your account.');
        });
        return redirect('/');
    }

    public function active()
    {
        $token = request('verify');
        $rs = User::where('registration_id', $token)
                            ->whereBetween('updated_at', [Carbon::now()->subDay(), Carbon::now()]);
        if ($rs->exists()) {
            $rs->update(['active'=>true]);
            return redirect('/login');
        }
    
        return redirect('/logout');
    }
}
