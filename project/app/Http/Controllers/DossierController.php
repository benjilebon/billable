<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dossier;
use App\Facture;

class DossierController extends Controller
{
    public function index() {
        $dossiers = Dossier::all();
        


        return view('dossier', ['dossiers' => $dossiers]);
    }

    public function close(Int $id) {

        $facture = Facture::find($id);

        $facture->status = 5;
        $facture->save();

        return redirect(route('dossiers'));

    }
}
