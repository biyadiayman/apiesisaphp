<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absence;

class AbsencesController extends Controller
{
    public function absencesEtudiant($idEtudiant, Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
            //$idEtudiant = 10104212181680;
            return Absence::Where('id_etudiant', $idEtudiant)->get();
        }
        return response(401, 401);
    }

    public function all(Request $request)
    {

        if($request->header("key") == "ESISAAPIACCESS"){
            return Absence::all();
        }
        return response(401, 401);
 
    }
}
