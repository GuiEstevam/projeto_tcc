<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function storeExperience(Request $request){
        if(!empty($request->id)){
            $Experience = Experience::findOrFail($request->id);

            $Experience->update([
                'experienceName' => $request->experienceName,
                'institutionName' => $request->experienceInstitution,
                'firstDate' => $request->experienceFirstDate,
                'lastDate' => $request->experienceLastDate
            ]);
        }

        $user = auth()->user();
        $Experience = new Experience;

        $Experience->experienceName = $request->experienceName;
        $Experience->institutionName = $request->experienceInstitution;
        $Experience->firstDate = $request->experienceFirstDate;
        $Experience->lastDate = $request->experienceLastDate;
        $Experience->user_id = $user->id;
        $Experience->save();
        return back()->with('msg', 'Experiencia adicionada com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Experience = Experience::findOrFail($id);
        $Experience->delete();

        return back()->with('msg', 'Experiência excluída com sucesso!');
    }
}
