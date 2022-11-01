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
    public function show($id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;
        $experiences = $user->experience;
        return view('profile.show', 
        ['Experiences' => $experiences,
        'Profile' => $profile,
        'User' => $user, 
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
        $Profile->tags = $request->tags;
        
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

    public function edit($id)
    {
        $User = Auth()->user();
        $Profile = $User->profile;
        $Tag = Tag::all();
        $Campus = Campus::all();
        $Experiences = $User->experience;
        $Profile = Profile::findOrFail($id);

        if ($User->id != $Profile->user_id) {
            return redirect('/dashboard');
        }
        return view('profile.edit',
        [
        'Campus' => $Campus,
        'Experiences'=> $Experiences,
        'Profile' => $Profile, 
        'Tag'=> $Tag,
        'User' => $User]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // Image Upload
        if($request->hasFile('profile_photo_path') && $request->file('profile_photo_path')->isValid()) {

            $requestImage = $request->profile_photo_path;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/profile_photo'), $imageName);

            $data['profile_photo_path'] = $imageName;

        }

        Profile::findOrFail($request->id)->update($data);

        return back()->with('msg', 'Perfil editado com sucesso!');
    }
}
