<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $users_count = User::whereRole('user')->count();
        $movies_count = Movie::where('percent',100)->count();
        $categories_count = Category::count();
        return view('dashboard.welcome',compact('users_count','movies_count','categories_count'));
    }
}
