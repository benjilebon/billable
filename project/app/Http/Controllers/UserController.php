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

        return view('dashboard', ['devis' => $devis]);
    }
}
