<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Serie;
use Illuminate\Support\Str;
use Validator;
use App\Helper\ImageManager;
use Storage;

class ImporterController extends Controller
{
    use ImageManager;

    public function index($page)
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/tv?include_adult=false&include_null_first_air_dates=false&language=en-US&page=1&sort_by=popularity.desc&with_keywords=210024&&page=' . $page, [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxYzVmM2RkZjcyMDBhYjFlNDdiMjNjMmIxMmVkN2Y4YiIsInN1YiI6IjY0NTk1MzUyMWI3MGFlMDE4N2UwYzU3MCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.4G3DOGmXWc-OFGIm6pZTqWiitVY8Hfo1SJWtlHublqY',
                'accept' => 'application/json',
            ],
        ]);
        return $response->getBody();
    }
    public function show()
    {
        return Inertia::render('Admin/Import/Index');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:252',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '422',
                'errors' => $validator->messages()
            ], 422);
        } else {

            Storage::disk('poster_series')->put(substr($request->poster_path, strrpos($request->poster_path, '/') + 1), file_get_contents($request->poster_path));
            Storage::disk('banner_series')->put(substr($request->backdrop_path, strrpos($request->backdrop_path, '/') + 1), file_get_contents($request->backdrop_path));

            $serie = new Serie;
            $serie->name = $request->name;
            $serie->slug = Str::slug($request->name);


            $serie->metadata = [
                'name' => $request->name,
                'original_name' => $request->original_name,
                'description' => $request->description,
                'posters' => [
                    'cover' => substr($request->poster_path, strrpos($request->poster_path, '/') + 1),
                    'banner' => substr($request->backdrop_path, strrpos($request->backdrop_path, '/') + 1)
                ],
                'production_companies' => [
                    $request->productions,
                ],
                'tagline' => $request->tagline,
                'seasons' => $request->seasons,
                'episodes' => $request->episodes,
            ];
            $serie->save();
        }
    }
}
