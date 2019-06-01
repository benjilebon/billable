<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dossier;

class DossierController extends Controller
{
    public function index() {
        $dossiers = Dossier::all();
        


        return view('dossier', ['dossiers' => $dossiers]);
    }
}
