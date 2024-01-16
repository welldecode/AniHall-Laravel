<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $serie = Serie::orderBy('id', 'ASC')->limit(12)->get();
 
        return Inertia::render('Home', [
            'series' => $serie,
        ]);
    }
}
