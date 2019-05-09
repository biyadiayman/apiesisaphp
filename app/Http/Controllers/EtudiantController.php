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
}
