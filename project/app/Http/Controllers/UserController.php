<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index() {
        $devis = DB::table('devis')
        ->where('is_validated', '=', 0)
        ->get();

        $facture = DB::table('facture')
        ->get();

        $dossier = DB::table('facture')
        ->where('status', '=', '5')
        ->get();

        return view('dashboard', ['devis' => $devis, 'facture' => $facture, 'dossier' => $dossier]);
    }
}
