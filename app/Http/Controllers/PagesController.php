<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;

//http://www.maatwebsite.nl/laravel-excel/docs/import
use Excel;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
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

    public function terms(){
        $results = Excel::selectSheets('terms')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
//            $reader->setSeparator('-');
        })->get();;

        return view('terms')->with('results', $results);
    }

    public function privacy(){
        $results = Excel::selectSheets('terms')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
        })->get();;

        return view('terms')->with('results', $results);
    }

    public function faq(){
        $results = Excel::selectSheets('faq')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
        })->get();;

        return view('terms')->with('results', $results);
    }

    public function about(){
        $results = Excel::selectSheets('terms')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
        })->get();;

        return view('terms')->with('results', $results);
    }

    public function support(){
        $results = Excel::selectSheets('terms')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
        })->get();;

        return view('terms')->with('results', $results);
    }

    public function contact(){
        $results = Excel::selectSheets('terms')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
        })->get();;

        return view('terms')->with('results', $results);
    }

    public function cookie(){
        $results = Excel::selectSheets('terms')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
        })->get();;

        return view('terms')->with('results', $results);
    }

    public function sitemap(){
        $results = Excel::selectSheets('terms')->load('sitefiles\excel\324252345.xlsx', function($reader) {
            // Getting all results
            $results = $reader->get();
        })->get();;

        return view('terms')->with('results', $results);
    }

}
