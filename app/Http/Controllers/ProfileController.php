<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth;
use App\Models\Campus;
use App\Models\Projeto;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = auth()->user();
        $Projeto = Projeto::all();
        return view('profile.mainProfile', ['Projeto' => $Projeto, 'user' => $user, 'users' => $users]);
    }
    
    public function setAdministrator(){
        $user = Auth()->user();
        $user->role_id = 1;
        $user->save();
        return redirect('/dashboard')->with('msg', 'Parabéns! Agora você é administrador do sistema');

    }
    public function create()
    {
        $Users = User::all();
        $user = Auth()->user();
        $Projeto = $user->projetos;
        $projetosAsParticipant = $user->projetosAsParticipant;

        $id = $user->id;
        $Profile = Profile::findOrFail($id);
        $Experiences = $user->experience;

        if(empty($Profile)){
            $Tag = Tag::all();
            $Campus = Campus::all();
            error_log('Some message here.');
            return view('profile.createProfile', 
            ['Campus'=> $Campus,
            'Experiences' => $Experiences, 
            'Tag' => $Tag, 
            'User'=> $user]);
        }
        
        return redirect('/dashboard')->with('msg', 'Perfil criado com sucesso!');
    }
    public function store(Request $request){
        $Profile = new Profile;

        $Profile->graduation = $request->graduation;
        $Profile->semester = $request->semester;
        $Profile->description = $request->description;
        $Profile->campus = $request->campus;
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/profile_photo'), $imageName);
            $Profile->profile_photo_path = $imageName;
        }
        $user = auth()->user();
        $Profile->user_id = $user->id;
        $Profile->save();

        return redirect('/dashboard')->with('msg', 'Perfil criado com sucesso!');
    }
}
