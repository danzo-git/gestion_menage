<?php

namespace App\Http\Controllers;

use App\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taches = Tache::all();
        $taches=Tache::orderBy('created_at','desc')->paginate(5);
        return view('pages.index', compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tache=new \App\Tache;
        $tache->nom_tache = $request->nom_tache;
        $tache->proprietaire_tache=$request->proprietaire_tache;
        $tache->date=$request->date;
        $tache->description_tache=$request->description_tache;
        $tache->image=$request->image;
       // Tache::create($request->all());
       
       $tache->save();
        return redirect()->route('taches.index')->with('info', 'La tache     a bien été créé');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
   //dd($taches);
    $tache = Tache::find($id);
    return view('pages.show')->with('tache',$tache);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tache=Tache::find($id);
       //$tache=Tache::all();

       return view('pages.edit', compact('tache'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tache=Tache::find($id);
        $tache->update($request->all());

        return redirect()->route('taches.index')->with('info','super modification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taches=Tache::find($id);
        $taches->delete();
        return back()->with('info','suppression effectué avec succes');
    }
}
