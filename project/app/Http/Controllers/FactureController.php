<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devis;
use App\Dossier;
use App\Http\Requests\StoreFacture;
use Illuminate\Auth\Events\Registered;
use App\Facture;
use PDF;
use Storage;

class FactureController extends Controller
{
    public function index(Int $id) {
        $dossier = Dossier::find($id);
        $devis = Devis::find($dossier->devis_id);

        return view('facture', [
            'devis' => $devis,
            'dossier' => $dossier
        ]);
    }

    public function redirectTo() {
        return route('dossiers');
    }

    public function store(Int $id, StoreFacture $request) {

        $data = $request->validated();

        $facture = new Facture();
        $facture->email = $data['email'];
        $facture->notify(new TemplateEmail());
        
        event(new Registered($this->register($data, $id)));

        return redirect($this->redirectTo());
    }

    public function register(array $data, Int $id) {

        $dossier = Dossier::find($id);
        $devis = Devis::find($dossier->devis_id);

        $facture = Facture::create([
            'client_address' => $data['clientaddress'],
            'status' => 0,
        ]);

        
        

        $pdf = PDF::loadView('templates.factureTemplate', ['dossier' => $dossier, 'data' => $data, 'facture' => $facture, 'devis' => $devis]);
        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/facture/facture-'.$facture->id.'.pdf', $content);

        $dossier->facture = Storage::url('public/facture/facture-'.$facture->id.'.pdf');
        $dossier->facture_id = $facture->id;
        $dossier->save();

        return $facture;
    }
}
