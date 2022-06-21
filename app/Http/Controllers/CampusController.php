<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campus;

class CampusController extends Controller
{
    public function listagem()
    {
        $Campus = Campus::all();
        return view('campus.listagem', ['Campus' => $Campus]);
    }

    public function create()
    {
        return view('campus.create_campus');
    }
    public function store(Request $request)
    {
        $Campus = new Campus;

        $Campus->name = $request->name;
        $Campus->disponibility = $request->disponibility;

        $Campus->save();
        return redirect('/campus/listagem')->with('msg', 'Campus criado com sucesso!');
    }

    public function destroy($id)
    {
        $Campus = Campus::findOrFail($id);

        $Campus->delete();

        return redirect('/campus/listagem')->with('msg', 'Campus excluído com sucesso!');
    }
}
