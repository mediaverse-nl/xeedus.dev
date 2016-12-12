<?php

namespace App\Http\Controllers;

use App\Order;
use App\Category;
use App\Review;
use App\Video;

use App\Http\Controllers\VideoStream;

use Illuminate\Support\Facades\Input;
use Validator;

use File;
use Image;

use Auth;
use Illuminate\Support\Facades\Storage;
use Session;

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{

    protected $category;
    protected $video;
    protected $author;
    protected $order;
//    protected $user;

    public function __construct()
    {
//        $this->video_key = Input::get('w');
//        $this->user = Auth::user();
//        $this->video = Video::where('video_key', $this->video_key)->first();
        $this->category = '';
        $this->order = new Order;
        $this->video = new Video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name, $subname, $id)
    {
        $videos = Video::where(function($q) use ($id){
            $level = Input::has('level') ? Input::get('level') : 0;
            $author = Input::has('author') ? Input::get('author') : 0;
            $price = Input::has('price') ? Input::get('price') : 0;
            if (!empty($price)){
                $q->whereBetween('prijs', explode(',',$price));
            }
            if($level != 0){
                $q->whereIn('level', $level);
            }
            if($author != 0){
                $q->whereIn('author_id', $author);
            }
            $q->where('status', 'public');
            $q->where('category_id', $id);
        })->get();

        $base = Video::where('status', 'public')->where('category_id', $id);
        $level = Video::where('status', 'public')->where('category_id', $id);
        $author = Video::where('status', 'public')->where('category_id', $id);
        $category = Category::find($id);

        return view('courses.index')
            ->with('videos', $videos)
            ->with('category', $category)
            ->with('base_level', $level)
            ->with('base_author', $author)
            ->with('base_max', $base->max('prijs'))
            ->with('base_min', $base->min('prijs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        $video = $this->video->where('video_key', $key)->first();
        $videos = $this->video->where('author_id', $video->author_id)->get();
//        $order =  $this->order->where('user_id', Auth::user()->id)->where('video_id', $key)->exists();

        $order = Auth::user()->order->where('video_id', $video->id)->isEmpty();
//dd($order);

//        dd($order);
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('video.index')
            ->with('video', $video)
            ->with('videos', $videos)
            ->with('status', $order);
//            ->with('order', $orders)
//            ->with('orders', $orders);
    }

    public function GetImage($filename = null)
    {
        $path = public_path('public\videos\thumbnail\\').$filename;
        return $path;
    }

    public function GetVideo($video_key)
    {
        $video = Video::where('video_key', $video_key)->firstOrFail();
        $videosDir = public_path('videos\media\\');

        if (file_exists($filePath = $videosDir."\\".$video->video)) {
            $stream = new \App\Helpers\VideoStream($filePath);
            return response()->stream(function() use ($stream) {
                $stream->start();
            });
        }
        return response("File doesn't exists".$videosDir, 404);
    }

}
