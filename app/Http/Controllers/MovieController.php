<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){


        if (\request()->ajax()){
            $movies = Movie::whenSearch(\request()->search)->get();
            return $movies;
        }

        $movies = Movie::whenCategory(request()->category_name)
            ->whenSearch(\request()->search)->paginate(5);

        return view('movies.index',compact('movies'));
    }

    public function show(Movie $movie){
        $related_movies = Movie::where('id','!=',$movie->id)
            ->whereHas('categories',function ($query) use ($movie){
                return $query->whereIn('category_id',$movie->categories->pluck('id')->toArray());
            })->get();
        return view('movies.show',compact('movie','related_movies'));
    }

    public function increment_views(Movie $movie)
    {
       $movie->increment('views');
    }
}
