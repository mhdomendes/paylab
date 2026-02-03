<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plano;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::all();
        return view('planos.index', compact('planos'));
    }
}
