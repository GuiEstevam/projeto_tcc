<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth;
use App\Models\Projeto;
use App\Models\User;
use App\Models\Tag;
use App\Models\Campus;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = auth()->user();
        $Projeto = Projeto::all();
        return view('welcome', ['Projeto' => $Projeto, 'user' => $user, 'users' => $users]);
    }
    
    public function setAdministrator(){
        $user = Auth()->user();
        $user->role_id = 1;
        $user->save();
        return redirect('/')->with('msg', 'Parabéns! Agora você é administrador do sistema');

    }
}
