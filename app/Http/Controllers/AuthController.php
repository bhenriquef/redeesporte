<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Model\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function index(){
        return view('index');
    }

    public function tela_registro()
    {
        return view('registrar');
    }

    public function login(Request $request){
        
        request()->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);
        
        // $credentials = $request->only('email', 'senha');
        $email = $request->input('email');
        $password = $request->input('senha');

        $user = Usuario::where('email', '=', $request->input('email'))->first();

        if($user && Hash::check($password, $user->senha)){
            Auth::login($user);
            return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
        }

        return Redirect::to("login")->withErrors('Oppes! You have entered invalid credentials');
    }

    public function registrar(Request $request)
    {  
        request()->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required|min:6',
            'telefone' => 'required',
        ]);
         
        $data = $request->all();
 
        $check = $this->cadastrar($data);
       
        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
     
    public function dashboard()
    {
      if(Auth::check()){
        return view('dashboard');
      }

       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
 
    public function cadastrar(array $data)
    {
      return Usuario::create([
        'nome' => $data['nome'],
        'email' => $data['email'],
        'senha' => Hash::make($data['senha']),
        'telefone' => $data['telefone'],
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
