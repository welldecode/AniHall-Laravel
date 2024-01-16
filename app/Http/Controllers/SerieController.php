<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Inertia\Inertia;

class SerieController extends Controller
{
    //
    public function index($slug)
    {
        $post = Serie::where('slug', $slug)->first();

        $serie = Serie::find($post->id);
        $serie->views++;
        $serie->save();
        
        return Inertia::render('Serie/Index', [
            'serie' => $post->metadata,
        ]);
    }
}
