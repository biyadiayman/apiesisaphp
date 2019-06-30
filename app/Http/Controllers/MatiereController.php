<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matiere;


class MatiereController extends Controller
{
    public function all(Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
            return Matiere::all();
        }
        return response(401, 401);

    }

    public function getMatiere($idMatiere, Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
            return Matiere::Where('id', $idMatiere)->get();
        }
        return response(401, 401);

    }
}
