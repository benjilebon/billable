<?php

namespace App\Http\Controllers;

use App\Notifications\TemplateEmail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDevis;
use Illuminate\Auth\Events\Registered;
use App\Devis;
use PDF;
use Storage;
use App\Dossier;


class DevisController extends Controller
{
    public function index() {
        return view('devis');
    }

    public function redirectTo() {
        return route('dashboard');
    }

    public function store(StoreDevis $request) {

        $data = $request->validated();

        $devis = new Devis();
        $devis->email = $data['email'];
        $devis->notify(new TemplateEmail());

        
        event(new Registered($this->register($data)));

        return redirect($this->redirectTo());
    }

    public function register(array $data) {

        
        
        
        $devis =  Devis::create([
            'corporate'             => $data['corporate'],
            'name'                  => $data['name'],
            'address'               => $data['address'],
            'postal_code'           => $data['postalcode'],
            'email'                 => $data['email'],
            'product_name'          => $data['productname'],
            'quantity'              => $data['quantity'],  
            'pu'                    => $data['pu'],
            'tva'                   => $data['tva'],
            'project_name'          => $data['project-name'],
            'payment_conditions'    => $data['payment_conditions'],
            'contact'               => $data['contact'],
            'phone'                 => $data['phone'],
            'rcs'                   => $data['rcs'],
            'intra_community_tva'   => $data['intracommunitytva'],
            'city'                  => $data['city'],
            ]);
            
            $pdf = PDF::loadView('templates.devis', ['devis' => $devis]);

            $content = $pdf->download()->getOriginalContent();
            
            Storage::put('public/devis/devis-'.$devis->id.'.pdf', $content);
            
            return $devis;
            
        }
        
        public function sign(Int $id) {
            $devis = Devis::find($id);

        $devis->is_validated = 1;
        $devis->save();

        Dossier::create([
            'corporate' => $devis->corporate,
            'name' => $devis->name,
            'address' => $devis->address,
            'postal_code' => $devis->postal_code,
            'devis' => Storage::url('public/devis/devis-'.$devis->id.'.pdf'),
            'devis_id' => $devis->id
        ]);

        return redirect(route('dossiers'));
    }
}
