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
        //get all competitions and sort by id desc
        return MovieIndexResource::collection(Movie::all());
    }

    public function show($id)
    {
        //return one competition by id
        return new MovieShowResource(Movie::findOrFail($id));
    }

    public function store(Request $request)
    {
        //store player in db and return it
        // $data = $request->validate([
        //     'title'        => 'required',
        //     'status'       => 'required'
        // ]);

        //create custom movie with player id 1
        // $movie = Movie::make($data);
        // $movie->player_id = 1;
        // $movie->save();


        // return new MovieShowResource($movie);

    }
}
