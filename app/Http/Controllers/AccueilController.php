<?php

namespace App\Http\Controllers;
use App\Tache;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(){
        return view('pages.anim');
    }

    public function donnees(){

        $taches = Tache::all();
        $taches=Tache::orderBy('created_at','desc')->paginate(5);
        return view('pages.affichage', compact('taches'));
    }
}
