<?php

namespace App\Http\Controllers;

use App\Notifications\TemplateEmail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDevis;
use Illuminate\Auth\Events\Registered;
use App\Devis;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Dossier;


class DevisController extends Controller
{
    public function index()
    {
        return view('devis');
    }

    public function redirectTo()
    {
        return route('dashboard');
    }

    public function store(StoreDevis $request)
    {


        $data = $request->validated();

        $devis = new Devis();
        $devis->email = $data['email'];


        $devis->notify(new TemplateEmail());

        //event(new Registered($this->register($data)));
        $devis = Devis::create([
            'corporate' => $data['corporate'],
            'name' => $data['name'],
            'address' => $data['address'],
            'postal_code' => $data['postalcode'],
            'email' => $data['email'],
            'product_name' => $data['productname'],
            'quantity' => $data['quantity'],
            'pu' => $data['pu'],
            'tva' => $data['tva'],
            'project_name' => $data['project-name'],
            'payment_conditions' => $data['payment_conditions']
        ]);
//        $pdf = PDF::loadView('templates.devisTemplate', ['devis' => $devis]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('templates.devisTemplate', ['devis' => $devis]);
//oad()->getOriginalContent();
        return $pdf->stream();


    }

    public function register(array $data)
    {



        //          Storage::put('public/devis/devis-'.$devis->id.'.pdf', $content);
        //        dd($content);
        //      return $devis;

    }

    public function sign(Int $id)
    {
        $devis = Devis::find($id);

        $devis->is_validated = 1;
        $devis->save();

        Dossier::create([
            'corporate' => $devis->corporate,
            'name' => $devis->name,
            'address' => $devis->address,
            'postal_code' => $devis->postal_code,
            'devis' => Storage::url('public/devis/devis-' . $devis->id . '.pdf'),
        ]);

        return redirect(route('dossiers'));
    }
}
