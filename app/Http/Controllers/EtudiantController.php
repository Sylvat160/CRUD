<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $listeE = Etudiant::orderBy('nom', 'asc')->paginate(5);
        return view('etudiant', compact('listeE'));
    }
    public function create()
    {
        $classes = Classe::all();
        return view('createEtudiant', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "numero" => "required",
            "classe_id" => "required"
        ]);
    
        Etudiant::create($request->all());
        return back()->with('success' , 'Etudiant ajoute avec succes');
    }

    public function delete (Etudiant $etudiant) {

        $nom_complet = $etudiant->nom . '' . $etudiant->prenom;
        $etudiant->delete();

        return back()->with('suppression' , ' L\'etudiant ' . "'". $nom_complet . "'" .  '  supprime ');

    }

    public function edit (Etudiant $etudiant) {

        $classes = Classe::all();
        return view('editEtudiant' , compact('classes','etudiant'));
    }

    public function update (Request $request , Etudiant $etudiant   )
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "numero" => "required",
            "classe_id" => "required"
        ]);
    
        $etudiant->update($request->all());
        return back()->with('success' , 'Modification  reussi');
    }

    
}
