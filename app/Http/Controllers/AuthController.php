<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function signUpView()
    {
        $gender = Gender::all();
        $roles = Role::all();
        if(Auth::guard('account')->check()){
            return redirect()->route('home');
        }
        return view('auth.sign-up',compact('gender','roles'));
    }
    public function signUp(Request $request)
    {
     
        $request->validate([
            'first_name' => 'required|max:25|regex:#^[a-zA-Z\s]*$#',
            'last_name' => 'max:25|regex:#^[a-zA-Z\s]*$#',
            'middle_name' => 'max:25',
            'gender_id' => 'required',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|min:8',
            'display_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        $account = new Account();
        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;
        $account->gender_id = $request->gender_id;
        $account->email = $request->email;
        $account->role_id = $request->roles_id;
        $account->password = bcrypt($request->password);
        $account->display_picture = $request->file('display_picture')->store(
            'assets/display_picture', 'public'
        );
        $account->save();

        return redirect()->route('sign-in')->with('success', 'Account created successfully');
    }

    public function signView()
    {
        if(Auth::guard('account')->check()){
            return redirect()->route('home');
        }
        return view('auth.sign-in');
    }

    public function sign(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::guard('account')->attempt($credentials))
            {   
                return redirect()->route('home');
            }
            return redirect()->route('sign-in')->with('error','Credentials not matced in our records!');
    }

    public function logout()
    {
        if (Auth::guard('account')->check()) {
            Auth::guard('account')->logout();
            return redirect()->route('logout.view');
        } 
        return redirect()->route('sign-in');
    }

    public function logoutView()
    {
        return view('auth.logout');
    }
}
