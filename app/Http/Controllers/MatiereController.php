<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matiere;


class MatiereController extends Controller
{
    public function all()
    {
        return Matiere::all();
    }
}
