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
<<<<<<< HEAD
        if($request->header("key") == "ESISAAPIACCESS"){
   
            // Login d'un parent
            $etudiant = Etudiant::Where('cin', $request->login)->firstOrFail();// cin
            $enfants = Etudiant::Where('idParentInfo', $etudiant->idParentInfo)->get();
            if($request->pwd == $etudiant->nom.''.$etudiant->cin && ! is_null($etudiant))
                return $enfants;
            return 'wrong Login/Pwd combo';
        }
        return response(401, 401);
=======
        // Login d'un parent
        $etudiant = Etudiant::Where('cin', $request->login)->firstOrFail();// cin
        $enfants = Etudiant::Where('idParentInfo', $etudiant->idParentInfo)->get();
        if($request->pwd == $etudiant->nom.''.$etudiant->cin && ! is_null($etudiant))
            return $enfants;
        return response('wrong Login/Pwd combo', 400);
    
>>>>>>> 521baea362a3359c0870937d438d61dd4e47438b
    }

    public function addEnfant(Request $request)
    {
<<<<<<< HEAD
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
=======
        // Ajout d'un enfant
        if(isset($request->cin) && isset($request->idUser)){
            $user = Etudiant::findOrFail($request->idUser);
            $etudiant = Etudiant::Where('cin', $request->cin)->firstOrFail();// cin
        if(
            str_replace(' ','',$etudiant->prenom) == str_replace(' ','',$request->prenom) &&
            str_replace(' ','',$etudiant->nom) == str_replace(' ','',$request->nom) &&
            $etudiant->dateNaissance == $request->dateNaissance 
        ){
            // ????
            $etudiant->idParentInfo = $user->idParentInfo;
            $etudiant->save();
            return $etudiant;
        }else{
            return response('Wrong info', 400);
        }
        }else{
            return response('Wrong info', 400);
>>>>>>> 521baea362a3359c0870937d438d61dd4e47438b
        }
        return response(401, 401);

    }
}
