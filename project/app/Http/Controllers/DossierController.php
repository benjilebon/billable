<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DossierController extends Controller
{
    public function index() {
        $dossiers = DB::table('dossier')
        ->get();
        


        return view('dossier', ['dossiers' => $dossiers]);
    }
}
