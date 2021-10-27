<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieIndexResource;
use App\Http\Resources\MovieShowResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        //list only movies with status 1 and rating > 5
        return MovieIndexResource::collection(Movie::hasArtists()->status()->rating(5)->get());
    }

    public function show($id)
    {
        return new MovieShowResource(Movie::findOrFail($id)->load('artists'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name'        => 'required|string',
            'rating' => 'required|numeric',
            'description'    => 'required|string',
            'movie_image' => 'required|file|image|max:2048'
        ]);

        //$pathToFile = $request->movie_image->store('images', 'public');
        $imageName = time().'.'.$request->movie_image->extension();
        $request->movie_image->move(public_path('images'), $imageName);

        if($imageName) {
            $movie = Movie::make($data);
            $movie->image = $imageName;
            $movie->save();
        }

        return new MovieShowResource($movie);

    }

    public function destroy($id)
    {   Movie::findOrFail($id)->delete();
        return new MovieShowResource(Movie::withTrashed()->find($id));
    }

    public function getArtistsMovies()
    {

        //list all movies
        return Movie::all()->load('artists');
    }

    public function getFilterMovie(Request $request)
    {

        //list all movies with a filteter
        $request = $request->all();

        $query = Movie::has('artists');
        
        if (array_key_exists('role', $request) && ($request['role'] !== 'null')) {
            $query = Movie::whereHas('artists', function ($q) use($request) {
                $q->where('title', '=', $request['role']);
            });
        }

        if (array_key_exists('rating', $request) && ($request['rating'] !== 'null')) {
            $query->rating($request['rating']);
        }

        if (array_key_exists('name', $request) && ($request['name'] !== 'null')) {
            $query->where('name', 'LIKE', '%' . $request['name'] . '%');
        }

        if (array_key_exists('status', $request) && ($request['status'] !== 'null')) {
            $query->status($request['status']);
        }

        $movies = $query->get()->load('artists');


        return $movies->count() ? $movies : response()->json([], 404);

        //return Movie::hasArtists()->get();

    }
}
