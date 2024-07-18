<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

    public function profile(){
       return view('profile.index');
    }

    public function updateProfile(Request $request){
        $validation = $request->validate([
            'email' => 'email',
            'name' => 'min:3',
            'old_password' => 'required|min:6',
            'new_password' => 'nullable|min:6',
            'new_password_confirmation' => 'nullable|min:6|same:new_password',
        ]);

        $user = User::find(Auth::user()->id);

        if(!Hash::check($request->old_password, $user->password)){
            return redirect('/profile')->with('error', 'Old password not match');
        }
        if($request->new_password !== null ){
            if($request->new_password !== $request->new_password_confirmation){
                return redirect('/profile')->with('error', 'New Password not match');
            }else{
                $newPassword = Hash::make($request->new_password);
            }
        }else{
            $newPassword = $user->password;
        }

        if($request->email !== $user->email){
            $emailExist = User::where('email', $request->email)->exists();
            if($emailExist){
                return redirect('/profile')->with('error', 'Email already exist');
            }
        }
        
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $newPassword;
        $user->save();
        return redirect('/profile')->with('success', 'Update success');

    }

    public function dashboard(){
        return view('dashboard');
    }
}
