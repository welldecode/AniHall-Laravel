<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Series/Index', [
            'series' => Serie::All(),
        ]);
    }
    public function edit($id = null)
    {
        if ($id == null) {
            $post = null;
        } else {
            $post = Serie::where('id', $id)->firstOrFail();
        }
        return Inertia::render('Admin/Series/Form', [
            'series' => $post,
        ]);
    }
    public function create(Request $request)
    {
        return Inertia::render('Admin/Series/Form');
    }
}
