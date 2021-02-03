<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cerita;
use App\Models\Like;

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
        $storyList = Cerita::join('users','users.id','=','ceritas.user_id')
                    ->select('users.name','ceritas.id','ceritas.title','ceritas.story','ceritas.created_at')->get();

        // dd($storyList);
        return view('home',compact('storyList'));
    }

    public function like(Request $request){
        $user_id = auth()->id();
        $dataForm = $request->except('_token');
        // dd($dataForm);
        $getLike = Like::where([
                    ['user_id','=',$user_id],
                    ['cerita_id','=',$dataForm]
                    ])->first();
        if(is_null($getLike)){
            $userID=["user_id"=>$user_id,'isLiked'=>true];
            $likeData = array_merge($dataForm,$userID);
            // dd($likeData);
            $saveLike= Like::create($likeData);
            return redirect()->route('home')->with('status','anda menyukai postingan ini');
        } else {
            return redirect()->route('home')->with('status','anda sudah menyukai postingan ini');
        }
    }
}
