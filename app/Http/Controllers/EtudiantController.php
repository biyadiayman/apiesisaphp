<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;

class EtudiantController extends Controller
{
    public function all(Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
            return Etudiant::all();
        }
        return response(401, 401);
        
    }

    public function getEtudiant($idEtudiant, Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
           return Etudiant::Where('idEtudiant', $idEtudiant)->get();
        }
        return response(401, 401);
    
    }

    public function loginEtudiant(Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
   
            // Login d'un parent
            $etudiant = Etudiant::Where('cin', $request->login)->firstOrFail();// cin
            $enfants = Etudiant::Where('idParentInfo', $etudiant->idParentInfo)->get();
            if($request->pwd == $etudiant->nom.''.$etudiant->cin && ! is_null($etudiant))
                return $enfants;
            return 'wrong Login/Pwd combo';
        }
        return response(401, 401);
    }

    public function addEnfant(Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
            
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
                return 'Wrong info';
            }
            }else{
                return 'Wrong info';
            }
        }
        return response(401, 401);

    }
}
