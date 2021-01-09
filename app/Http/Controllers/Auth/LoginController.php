<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        $data = array('name'=>auth()->user()->name);
        Mail::send('emails.login', $data, function($message) {
            $message->to(auth()->user()->email, auth()->user()->name)->subject
            ('Login Notification');
            $message->from(env('MAIL_FROM_ADDRESS'),env('APP_NAME'));
        });
        if (auth()->user()->hasRole('client')){
            $this->redirectTo = route('client.home.index');
            return $this->redirectTo;
        }
        elseif (auth()->user()->hasRole('tenant')){
            $this->redirectTo = route('tenant.home.index');
            return $this->redirectTo;
        }
        elseif (auth()->user()->hasRole('senior-property-manager')){
            $this->redirectTo = route('spm.home.index');
            return $this->redirectTo;
        }
        elseif (auth()->user()->hasRole('property-manager')){
            $this->redirectTo = route('pm.home.index');
            return $this->redirectTo;
        }
        elseif (auth()->user()->hasRole('facility-manager')){
            $this->redirectTo = route('fm.home.index');
            return $this->redirectTo;
        }
        elseif (auth()->user()->hasRole('ceo')){
            $this->redirectTo = route('ceo.home.index');
            return $this->redirectTo;
        }
        elseif (auth()->user()->hasRole('superadmin')){
            $this->redirectTo = route('superadmin.home.index');
            return $this->redirectTo;
        }
        else{
            return redirect('404');
        }
    }
}
