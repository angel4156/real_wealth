<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isFalse;

class AuthController extends Controller
{
    
    public function index()
    {

        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $user = User::where('email', '=', $request['email'])->first();
        $adminUser=User::where('id_user','=',1)->first();
        if($user == null) {
            return response()->json([
                "status" => false,
                'email' => 'Email is not registered'
            ]);
        }
        $isPasswordCorrect = Hash::check($request['password'], $user['password']);
        if(!$isPasswordCorrect) {
            return response()->json([
                "status" => false,
                'password' => 'Password is incorrect'
            ]);
        }

        if (Auth::attempt($request->only(["email", "password"]))) {
           if($user == $adminUser){

               return response()->json([
                   "status" => true, 
                   "redirect" => url("dashboard")
               ]);
           } else{
            return response()->json([
                "status" => true, 
                "redirect" => url("main")
            ]);
           }
        } else {
            return response()->json([
                "status" => false,
                "errors" => ["Invalid credentials"]
            ]);
        }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function process(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'cpassword' => 'required|same:password'
        ]);
        $validated['password'] = Hash::make($request['password']);

        $user = User::create($validated);

        Alert::success('Success', 'Register user has been successfully !');
        return response()->json([
            "status" => true, 
            "redirect" => url("login")
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Log out success !');
        // return view('main.first');
        return redirect('/');
    }
}
