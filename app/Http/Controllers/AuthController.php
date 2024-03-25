<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class AuthController extends Controller
{
    public function login(){
        // if(Auth::check()){
        //     return redirect()->route('dashboard');
        // }
        return view('auth.login');
    }
 
    public function post(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
    
        // dd($credentials); // Vérifiez si les informations d'identification sont correctes
    
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
        return back()->with('error', 'E-mail ou mot de passe incorrect');
    }
    
 
    public function register(){
        // if(Auth::check()){
        //     return redirect()->route('dashboard');
        // }
        return view('auth.register');
    }
 
    public function postRegister(Request $request){
        $check_email = User::where('email', $request->email)->first();
        if($check_email){
            return back()->with('error', 'E-mail déjà utilisé');
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        return redirect()->route('login')->with('success', 'Félicitations, votre compte a été créé avec succès !');
    }
    
 
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard(){
        return view('dashboard');
    }

}