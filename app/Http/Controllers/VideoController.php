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
    protected $video_key;
    protected $order;
    protected $user;

    public function __construct()
    {
        $this->video_key = Input::get('w');
//        $this->video_key = Route::current()->getParameter('key');
        $this->user = Auth::user();
        $this->video = Video::where('video_key', $this->video_key)->first();
        $this->category = '';
        $this->order = Order::all();
        $this->videos = new Video();
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

        dd( Input::get('w'));
//        $author_id = $this->video->author->id;
//
//        $order = Order::where('user_id', $this->user->id)
//            ->where('video_id', $this->video->id)
//            ->exists();
//
//        $videos = Video::where('author_id', $author_id)
//            ->get();
//
//        $orders = Order::where('user_id', $this->user->id)
//            ->get();
//
//        $review = Review::where('user_id', $this->user->id)
//            ->where('video_id', $this->video->id)
//            ->exists();
//
//        return view('video.index')
//            ->with('video', $this->video)
//            ->with('list', $videos)
//            ->with('review', $review)
//            ->with('status', $order)
//            ->with('orders', $orders);
    }

    public function search(Request $request){

        $rules = [
            'keyword' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
//                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $keyword = \Input::get('keyword');

        if ($keyword != '') {
            $videos = $this->videos->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%")
                    ->orWhere("beschrijving", "LIKE", "%$keyword%");
            })->get();
        }

        return view('courses.search')
            ->with('videos', $videos);

    }

    public function GetImage($filename = null){

//        $path = public_path().'/videos/thumbnail/' . $filename;
        $path = public_path('public\videos\thumbnail\\').$filename;

//        if (file_exists($path)) {
//            return Response::download($path);
//        }else{
//            return 'error';
//        }
//
//        return Image::make('foo/bar.jpg')->response('png');
//
//        $path = storage_path() . '/' . $filename;
//        $path = Image::canvas(800, 600, '#ff0000');
//
////        if(!File::exists($path)) abort(404);
//
//        $file = File::get($path);
//        $type = File::mimeType($path);
//
//        $response = Response::make($file, 200);
//        $response->header("Content-Type", $type);
//
//        return $response;
//        $entry = Video::where('thumbnails', '=', $filename)->first();
//        $file = Storage::disk('local')->get($entry->thumbnails);
//        $destinationPath = base_path('\public\videos\thumbnail\\').$entry->thumbnails;
//
//        $type = File::mimeType($destinationPath);
//        return Image::make(storage_path() . '/' . $filename)->response();
//        return Response($destinationPath, 200);
//
//        $path = storage_path() . '\public\videos\thumbnail\\' . $filename;
//
//        if(!File::exists($path)) abort(404);
//
//        $file = File::get($path);
//        $type = File::mimeType($path);
//
//        $response = Response::make($path, 200);
//        $response->header("Content-Type", 'image/jpg');
//
//        return $response;
        return $path;
    }
//
    public function GetVideo($video_key){

        $video = Video::where('video_key', '=', $video_key)->firstOrFail();
//        $$video = Video::where('video_key', $filename)->first();
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
