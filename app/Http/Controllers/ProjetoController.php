<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth;

use App\Models\Projeto;
use App\Models\User;
use App\Models\Tag;
use App\Models\Campus;
use Illuminate\Support\Facades\DB;

class ProjetoController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = auth()->user();
        $Projeto = Projeto::all();
        return view('welcome', ['Projeto' => $Projeto, 'user' => $user, 'users' => $users]);
    }

    public function create()
    {
        $Tag = Tag::all();
        $Campus = Campus::all();
        return view('projetos.create', ['Tag' => $Tag, 'Campus'=>$Campus]);
    }

    public function store(Request $request)
    {
        $Projeto = new Projeto;

        $Projeto->name = $request->name;
        $Projeto->campus = $request->campus;
        $Projeto->description = $request->description;

        $tags = $request->tags;
        $campus = $request->campus;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/projects'), $imageName);
            $Projeto->image = $imageName;
        }

        $user = auth()->user();
        $Projeto->user_id = $user->id;
        $Projeto->save();

        $Projeto->campus()->attach($campus,['projeto_id'=> $Projeto->id]);

        foreach($tags as $tags){
            $Projeto->tags()->attach($tags,['projeto_id'=> $Projeto->id]);
        }
        return redirect('/')->with('msg', 'Projeto criado com sucesso!');
    }
    public function destroy($id)
    {
        $Projeto = Projeto::findOrFail($id);
        $user = auth()->user();

        if ($user->id != $Projeto->user_id) {
            return redirect('/dashboard')->with('msg','Você não é o proprietário deste projeto');
        }
        $Projeto->tags()->detach();
        $Projeto->campus()->detach();

        $Projeto->delete();

        return redirect('/')->with('msg', 'Projeto excluído com sucesso!');
    }

    public function edit($id)
    {
        $Campus = Campus::all();
        $Tags = Tag::all();
        $user = auth()->user();
        $Projeto = Projeto::findOrFail($id);
        $SelectedTags = $Projeto->tags()->where('projeto_id', $id)->get();

        if ($user->id != $Projeto->user_id) {
            return redirect('/dashboard')->with('msg','Você não é o proprietário deste projeto');
        }
        return view('projetos.edit', 
        ['Projeto' => $Projeto, 
        'SelectedTags'=> $SelectedTags,
        'Campus' => $Campus,
        'Tags'=> $Tags]);
    }

    public function update(Request $request)
    {
        $Projeto = Projeto::findOrFail($request->id);

        $Projeto->update([
            'name' => $request->name,
            'description'=>$request->description,
    ]);
        $campus = $request->campus;

        $Projeto->campus()->detach();

        $Projeto->campus()->attach($campus,['projeto_id'=> $Projeto->id]);

        $tags = $request->tags;
        $Projeto->tags()->detach();

    foreach($tags as $tags){
        $Projeto->tags()->attach($tags,['projeto_id'=> $request->id]);
    }
        return redirect('/')->with('msg', 'Projeto editado com sucesso!');
    }
    public function show($id)
    {
        $Projeto = Projeto::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;
        $hasUserApproved = false;

        if ($user) {
            $userProjects = $user->projetosAsParticipant->toArray();

            foreach ($userProjects as $userProject) {
                if ($userProject['id'] == $id) {
                    $hasUserJoined = true;
                    if ($userProject['pivot']['situacao'] == 1) {
                        $hasUserApproved = true;
                    }
                }
            }
        }
        $Tags = $Projeto->tags()->where('projeto_id', $Projeto->id)->get();
        $Campus = $Projeto->campus()->where('projeto_id', $Projeto->id)->get();

        $ProjectOwner = User::where('id', $Projeto->user_id)->first()->toArray();

        return view('projetos.show', 
        ['Campus' =>$Campus,'Tags'=> $Tags,'hasUserApproved' => $hasUserApproved, 
        'Projeto' => $Projeto, 'ProjectOwner' => $ProjectOwner, 
        'hasUserJoined' => $hasUserJoined, 'user' => $user]);
    }

    public function dashboard()
    {
        $Users = User::all();
        $user = auth()->user();
        $Projeto = $user->projetos;
        $projetosAsParticipant = $user->projetosAsParticipant;

        return view(
            'projetos.dashboard',
            ['Projetos' => $Projeto, 
            'projetosAsParticipant' => $projetosAsParticipant,
            'Users' => $Users,
            'User' => $user]
        );
    }

    public function joinProject($id)
    {
        $user = auth()->user();

        $Projeto = Projeto::findOrFail($id);

        $user->projetosAsParticipant()->attach($id, ['owner_id' => $Projeto->user_id]);
        

        return back()->with('msg', 'Sua solicitação foi enviada para o projeto: ' . $Projeto->name);
    }

    public function leaveProject($id)
    {
        $user = auth()->user();

        $user->projetosAsParticipant()->detach($id);

        $Projeto = Projeto::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Voce não faz mais parte do projeto:' . $Projeto->name);
    }

    public function main_layout()
    {
        $user = auth()->user();
        return view('layouts.main', ['nomedousuario' => $user]);
    }

    public function participantes($id)
    {
        $user_id = auth()->user()->id;
        $pendentes = DB::select(
            'select u.name,
        case p.situacao
        when "0" then "Aguardando Aprovacao"
        end situacao, p.owner_id, p.user_id
        from projeto_user p
        join users u
        on p.user_id = u.id
        where p.owner_id = ? and p.projeto_id = ? and p.situacao = 0 ',
            [$user_id, $id]
        );

        $aprovados = DB::select(
            'select u.name,
        case p.situacao
        when "1" then "Aprovado"
        end situacao, p.owner_id, p.user_id
        from projeto_user p
        join users u
        on p.user_id = u.id
        where p.owner_id = ? and p.projeto_id = ? and p.situacao = 1',
            [$user_id, $id]
        );
        
        return view(
            'projetos.participantes',
            [
                'pendentes' => $pendentes,
                'aprovados' => $aprovados
            ]
        );
    }

    public function aceitar($id)
    {
        $aluno = DB::select('select u.name
        from users u
        join projeto_user pu
        on pu.user_id = u.id
        where pu.user_id = ?', [$id]);

        foreach ($aluno as $aluno) {
            $nome = $aluno->name;
        }

        DB::update('update projeto_user set situacao = "1" where user_id =?', [$id]);

        return back()->with('msg', 'O aluno ' . $nome . ' agora é participante do projeto');
    }

    public function recusar($id)
    {


        $aluno = DB::select('select u.name
        from users u
        join projeto_user pu
        on pu.user_id = u.id
        where pu.user_id = ?', [$id]);

        foreach ($aluno as $aluno) {
            $nome = $aluno->name;
        }

        DB::update('delete from projeto_user where user_id = ?', [$id]);

        return back()->with('msg', 'A partipação do aluno ' . $nome . ' foi recusada');
    }
}
