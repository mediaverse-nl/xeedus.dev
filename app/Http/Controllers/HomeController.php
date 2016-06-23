<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::orderBy('created_at', 'desc')->get();

        $best_video = DB::table('videos')
            ->rightjoin('views', 'videos.id', '=', 'views.video_id')
            ->selectRaw('views.*, count(views.video_id) as RoomsCount')
            ->get();

        return view('home')
            ->with('video', $video)
            ->with('best_video', $best_video);
    }
}
