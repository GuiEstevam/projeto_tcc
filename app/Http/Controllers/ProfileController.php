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
    public function show()
    {
        $user = auth()->user();
        $tags = Tag::all();
        $experiences = $user->experience;
        return view('profile.show', 
        ['experencie' => $experiences,
        'tag' => $tags,
        'user' => $user, 
        ]);
    }
    
    public function setAdministrator(){
        $user = Auth()->user();
        $user->role_id = 1;
        $user->save();
        return redirect('/dashboard')->with('msg', 'Parabéns! Agora você é administrador do sistema');

    }
    public function create()
    {
        $User = Auth()->user();
        $Tag = Tag::all();
        $Campus = Campus::all();
        $Experiences = $User->experience;

        return view('profile.createProfile', 
        ['Campus'=>$Campus,
        'Experiences' => $Experiences, 
        'Tag' => $Tag, 
        'User'=> $User]);
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
