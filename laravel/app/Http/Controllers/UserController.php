<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        # Pedir para o Request validar esses dados: name, email, passord
        # Todos esses valores precisam ser enviador pelo form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        # Criar objeto usuário, com as informações enviadas pelo request
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        #Salva o Objecto, e joga dentro de uma variável
        $res = $user->save();

        #Teste então o resultado dessa variável
        #   Se for true, então ele salvou, então enviamos de volta, success e uma mensagem.
        #   Se não fro true, então não salvou, então enviamos de volta, fail e uma messagem.
        #Para enviar de volta usar o método with, da função back. 
        if($res){
            return back()->with("success", "You Have Registrate");
        }else {
            return back()->with('fail', "Something Wrong");
        }


    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else {
                return back()->with('fail', 'Password not mttch.');
            }

        }else {
            return back()->with('fail', 'this email is not registered.');
        }
    }

    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
              
        }
        return view('dashboard', compact('data'));
    }


}
