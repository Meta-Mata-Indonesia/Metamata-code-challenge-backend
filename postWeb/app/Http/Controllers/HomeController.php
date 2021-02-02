<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cerita;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $storyList = Cerita::join('users','users.id','=','cerita.user_id')
                    ->select('users.name','ceritas.title','ceritas.story','ceritas.created_at')->get();
        // dd($storyList);
        return view('home',compact('storyList'));
    }
}
