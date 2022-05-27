<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth;

use App\Models\Projeto;
use App\Models\User;
use DB;

class ProjetoController extends Controller
{
    
    public function index(){
        $Projeto = Projeto::all();
        return view('welcome', ['Projeto' => $Projeto ]);
    }

    public function create(){
        return view('projetos.create');
    }

    public function store(Request $request){
        
        $Projeto = new Projeto;
        
        $Projeto->name = $request->name;
        $Projeto->campus = $request->campus;
        $Projeto->disponibility = $request->disponibility;
        $Projeto->description = $request->description;

        // Image Upload

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/projects'), $imageName);
            $Projeto->image = $imageName;
        }
        $user = auth()->user();
        $Projeto->user_id = $user->id;
        $Projeto->save();

        return redirect('/')->with('msg', 'Projeto criado com sucesso!');
    }
    public function destroy($id){

        Projeto::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        $Projeto = Projeto::findOrFail($id);

        if($user->id != $Projeto->user_id){
            return redirect ('/dashboard');
        }
        return view('projetos.edit',['Projeto'=> $Projeto]);
    }

    public function update(Request $request){

        Projeto::findOrFail($request->id)->update($request->all());
        return redirect('/')->with('msg', 'Evento editado com sucesso!');
    }
    public function show($id){
        $Projeto = Projeto::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userProjects = $user->projetosAsParticipant->toArray();

            foreach($userProjects as $userProject){
                if ($userProject['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $ProjectOwner = User::where('id', $Projeto->user_id)->first()->toArray();

        return view('projetos.show',['Projeto'=>$Projeto, 'ProjectOwner' => $ProjectOwner, 'hasUserJoined' => $hasUserJoined, 'user'=> $user]);
    }

    public function dashboard(){
        $user = auth()->user();
        $Projeto = $user->projetos;
        $projetosAsParticipant = $user->projetosAsParticipant;
        //trecho de código para pegar o usuário logado e verificar se ele tem projetos
        // e verificar se usuários tem a situação zero

        return view('projetos.dashboard',
        ['Projetos'=> $Projeto, 'projetosAsParticipant' => $projetosAsParticipant]);
    }

    public function joinProject($id){
        $user = auth()->user();

        $Projeto = Projeto::findOrFail($id);
        
        $user->projetosAsParticipant()->attach($id, ['owner_id' =>$Projeto->user_id]);

        //
        return redirect('/dashboard')->with('msg','Sua solicitação foi enviada para o projeto:'. $Projeto->name);

    }

    public function leaveProject($id){
        $user = auth()->user();

        $user->projetosAsParticipant()->detach($id);

        $Projeto = Projeto::findOrFail($id);

        return redirect('/dashboard')->with('msg','Voce não faz mais parte do projeto:'. $Projeto->name);

    }

    public function main_layout(){
        $user = auth()->user();
        return view('layouts.main',['nomedousuario' => $user]);
    }

    public function teste_devolucao($id){
        $user_id = auth()->user()->id;
        $situacao = DB::select('select u.name, 
        case p.situacao
        when "0" then "Aguardando Aprovacao"
        when "1" then "Aprovado"
        end situacao, p.owner_id, p.user_id 
        from projeto_user p 
        join users u 
        on p.user_id = u.id 
        where owner_id = ?',
        [$user_id]);

        return view('teste',
        ['situacao'=> $situacao]);
    }
}
