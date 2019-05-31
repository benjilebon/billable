<?php

namespace App\Http\Controllers;

use App\Devis;
use Illuminate\Http\Request;

class DevisTemplateController extends Controller
{
    public function index(){

        return view('templates.devisTemplate');
}
}
