<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Smartphone;
use Illuminate\Support\Facades\DB; 
class AuthController extends Controller
{

    public function login()
    {
        // Si l'utilisateur est déjà connecté, redirigez-le vers le dashboard
        if (Auth::check()) {
            return redirect()->route('auth.dashboard');
        }
        return view('auth.login');
    }
    public function dashboard()
    {
        $smartphones = Smartphone::all();
        $totalProducts = Smartphone::count();
       

        return view('auth.dashboard', compact('smartphones', 'totalProducts'));
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecte l'utilisateur
        $request->session()->invalidate(); // Invalide la session
        $request->session()->regenerateToken(); // Regénère le token CSRF
    
        return redirect()->route('auth.login'); // Redirige vers la page de connexion
    }
    
    public function doLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('auth.dashboard');
        // Redirige après connexion
    }

    return back()->withErrors([
        'email' => 'Les informations de connexion sont incorrectes.',
    ]);
}


  
}
/*
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Smartphone;
class AuthController extends Controller
{
    // Au lieu d'utiliser le middleware dans le constructeur,
    // nous allons le définir dans les routes

    public function login()
    {
        // Si l'utilisateur est déjà connecté, redirigez-le vers le dashboard
        if (Auth::check()) {
            return redirect()->route('auth.dashboard');
        }
        return view('auth.login');
    }

    public function dashboard()
    {
        $smartphones = Smartphone::all();

        return view('auth.dashboard', compact('smartphones'));
    }
   
public function doLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard'); // Redirige après connexion
    }

    return back()->withErrors([
        'email' => 'Les informations de connexion sont incorrectes.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
    

}*/