<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerAction(Request $request){
        $validation = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $userExist = User::where('email', $request->email)->exists();
        if($userExist){
            return redirect('/register')->with('error', 'Email already exist');
        }

        if($request->password != $request->password_confirmation){
            return redirect('/register')->with('error', 'Password not match');
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Register success');

    }

    public function loginAction(Request $request){
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'message' => 'Email or password not match'
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function ListBlok(){
        return view('ListBlok');
    }
}
