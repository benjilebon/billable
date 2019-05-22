<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDevis;
use Illuminate\Auth\Events\Registered;
use App\Devis;


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
        
        event(new Registered($this->register($data)));

        return redirect($this->redirectTo());
    }

    public function register(array $data) {
        return Devis::create([
            'corporate'             => $data['corporate'],
            'name'                  => $data['name'],
            'address'               => $data['address'],
            'postal_code'           => $data['postalcode'],
            'product_name'          => $data['productname'],
            'quantity'              => $data['quantity'],  
            'pu'                    => $data['pu'],
            'tva'                   => $data['tva'],
            'is_good_for_agreement' => $data['is_good_for_agreement'],
            'payment_conditions'    => $data['payment_conditions']  
        ]);
    }
}
