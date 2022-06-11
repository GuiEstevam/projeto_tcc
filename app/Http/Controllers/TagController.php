<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function festa()
    {
        $Tag = Tag::all();
        return view('tags.listagem', ['Tag' => $Tag]);
    }

    public function create()
    {
        return view('tags.create_tag');
    }
    public function store(Request $request)
    {
        $Tag = new Tag;

        $Tag->name = $request->name;
        $Tag->disponibility = $request->disponibility;

        $Tag->save();
        return redirect('/tags/listagem')->with('msg', 'Tag criada com sucesso!');
    }
}
