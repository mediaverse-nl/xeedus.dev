<?php

namespace App\Http\Controllers;

use App\Order;
use App\Category;
use App\Video;

use Auth;
use Session;

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Requests;

class VideoController extends Controller
{

    protected $category;
    protected $video;
    protected $author;
    protected $video_key;
    protected $order;
    protected $user;

    public function __construct()
    {
        $this->video_key = Route::current()->getParameter('key');
        $this->user = Auth::user();
        $this->video = Video::where('video_key', $this->video_key)->first();
        $this->category = '';
        $this->order = Order::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('cate_id', '>=', '0')->first();

        return view('courses.index')->with('category', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $author_id = $this->video->author->id;

        $order = Order::where('user_id', $this->user->id)
            ->where('video_id', $this->video->id)
            ->exists();

        $videos = Video::where('author_id', $author_id)->get();

        return view('video.index')
            ->with('video', $this->video)
            ->with('list', $videos)
            ->with('status', $order);
    }
}
