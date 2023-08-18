<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin(){
        return view('content.login');
    }

    public function showSignUp(){
        return view('content.signup');
    }

    public function checkLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/content');
        }

        return back()->withErrors([
            'email' => 'Creadentials do not match our recodes',
        ]);
    }

    public function SignUp(Request $request){
        $user = new User;
        $credentials = $request->validate([
            'name' => ['required','unique:users,name','max:32'],
            'email' => ['required','unique:users,email', 'email'],
            'password' => ['required','min:8'],
        ]);
        $this->save($user, $request);
        return redirect('/content');
    }

    private function save($data, $value)
    {
        $data->name = $value->name;
        $data->email = $value->email;
        $data->password = Hash::make($value->password);
        $data->save();
    }

    public function showLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('content.login');
    }
}
