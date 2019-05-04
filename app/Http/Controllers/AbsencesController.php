<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absence;

class AbsencesController extends Controller
{
    public function absencesEtudiant($idEtudiant)
    {
        //$idEtudiant = 10104212181680;
        return Absence::Where('id_etudiant', $idEtudiant)->get();
    }

    public function all()
    {
        return Absence::all();
    }
}
