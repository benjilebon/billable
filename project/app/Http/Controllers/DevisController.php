<?php

namespace App\Http\Controllers;

use App\Notifications\TemplateEmail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDevis;
use Illuminate\Auth\Events\Registered;
use App\Devis;
use PDF;
use Storage;


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

        $pdf = PDF::loadView('pdf.devis-pdf');

        $content = $pdf->download()->getOriginalContent();

        Storage::put('public/csv/name.pdf',$content) ;

        return Devis::create([
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
            'payment_conditions'    => $data['payment_conditions']  
        ]);
    }
}
