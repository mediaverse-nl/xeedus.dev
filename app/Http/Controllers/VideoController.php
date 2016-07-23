<?php

namespace App\Http\Controllers;

use App\Order;
use App\Category;
use App\Video;

use App\Helpers\VideoStream;

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

        $videos = Video::where('author_id', $author_id)
            ->get();


        $orders = Order::where('user_id', $this->user->id)
            ->get();

        return view('video.index')
            ->with('video', $this->video)
            ->with('list', $videos)
            ->with('status', $order)
            ->with('orders', $orders);
    }

    public function GetImage($filename){
        $entry = Video::where('thumbnails', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->thumbnails);

        return new Response($file, 200);
    }

    public function GetVideo($filename){

        $entry = Video::where('video', '=', $filename)->firstOrFail();
//        $file = Storage::disk('local')->get($entry->video);

//        return var_dump($entry);
//        return fopen($file, 'r');

//        return 'asdasd';
//        return $file;
        return  VideoStream(public_path().'\videos\media'."\\".$entry->video);
////
//
////
//        return new Response($file, 200);

//        $stream = new VideoStream($file);
//
//
//        return new Response($file, 200,$stream->start());

//        $size = Storage::disk('local')->size($entry->video);
//        $file = Storage::disk('local')->get($entry->video);
//        $stream = fopen($file, "r");
//
//        $type = 'video/mp4';
//        $start = 0;
//        $length = $size;
//        $status = 200;
//
//        $headers = ['Content-Type' => $type, 'Content-Length' => $size, 'Accept-Ranges' => 'bytes'];
//
//        if (false !== $range = Request::server('HTTP_RANGE', false)) {
//            list($param, $range) = explode('=', $range);
//            if (strtolower(trim($param)) !== 'bytes') {
//                header('HTTP/1.1 400 Invalid Request');
//                exit;
//            }
//            list($from, $to) = explode('-', $range);
//            if ($from === '') {
//                $end = $size - 1;
//                $start = $end - intval($from);
//            } elseif ($to === '') {
//                $start = intval($from);
//                $end = $size - 1;
//            } else {
//                $start = intval($from);
//                $end = intval($to);
//            }
//            $length = $end - $start + 1;
//            $status = 206;
//            $headers['Content-Range'] = sprintf('bytes %d-%d/%d', $start, $end, $size);
//        }
//
//        return Response::stream(function() use ($stream, $start, $length) {
//            fseek($stream, $start, SEEK_SET);
//            echo fread($stream, $length);
//            fclose($stream);
//        }, $status, $headers);

    }

}
