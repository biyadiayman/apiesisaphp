<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;

class EtudiantController extends Controller
{
    public function all()
    {
        return Etudiant::all();
    }

    public function getEtudiant($idEtudiant)
    {
        return Etudiant::Where('idEtudiant', $idEtudiant)->get();
    }

    public function loginEtudiant(Request $request)
    {
        // Login d'un parent
        $etudiant = Etudiant::Where('cin', $request->login)->firstOrFail();// cin
        $enfants = Etudiant::Where('idParentInfo', $etudiant->idParentInfo)->get();
        if($request->pwd == $etudiant->nom.''.$etudiant->cin && ! is_null($etudiant))
            return $enfants;
        return 'wrong Login/Pwd combo';
    
    }

    public function addEnfant(Request $request)
    {
        // Ajout d'un enfant
        if(isset($request->cin) && isset($request->idUser)){
            $user = Etudiant::findOrFail($request->idUser);
            $etudiant = Etudiant::Where('cin', $request->cin)->firstOrFail();// cin
        if(
            $etudiant->prenom == $request->prenom &&
            $etudiant->nom == $request->nom &&
            $etudiant->dateNaissance == $request->dateNaissance 
        ){
            // ????
            $etudiant->idParentInfo = $user->idParentInfo;
            //$etudiant->save();
            return $etudiant;
        }else{
            return 'Wrong info '.json_encode($etudiant->nom).'xoxo';
        }
        }else{
            return 'Wrong info (not set)';
        }


    }
}
