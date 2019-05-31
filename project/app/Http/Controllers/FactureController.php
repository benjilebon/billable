<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devis;
use App\Dossier;
use App\Http\Requests\StoreFacture;

class FactureController extends Controller
{
    public function index(Int $id) {
        $dossier = Dossier::find($id);
        $devis = Devis::find($dossier->devis_id);
        dd($devis);
        return view('facture', [
            'devis' => $devis,
            'dossier' => $dossier
        ]);
    }

    public function store(Int $id, StoreFacture $request) {

        $data = $request->validated();

        // $devis = new Devis();
        // $devis->email = $data['email'];
        // $devis->notify(new TemplateEmail());

        
        event(new Registered($this->register($data, $id)));

        return redirect($this->redirectTo());
    }

    public function register(array $data, Int $id) {

        $devis = Devis::find($id);

        $facture = Facture::create([
            'client_address' => $data['clientaddress']
        ]);

        $pdf = PDF::loadView('templates.facture', ['devis' => $devis, 'data' => $data]);

        $content = $pdf->download()->getOriginalContent();

        Storage::put('public/facture/facture-'.$facture->id.'.pdf', $content);

        return $facture;
    }
}
