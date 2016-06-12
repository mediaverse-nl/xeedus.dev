<?php

namespace App\Http\Controllers\Author;

use Auth;

use App\Video;
use App\User;
use Xeedus\Author;
use App\Category;

use Validator;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    protected $video;
    protected $new_video;
    protected $videos;
    protected $this_user;
    protected $author;

    public function __construct()
    {
        $this->author = User::find(Auth::user()->id)->author()->first();
//        $this->videos = Video::all()->where();
//        $this->this_user = Auth::user()->id;
        $this->new_video = new Video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::where('author_id', '=', $this->author->id)->get();

        return view('author.video.index')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'thumbnail.required'        => 'Select a profile image',
            'thumbnail.mimes'           => 'file type must be (JPEG, PNG, JNG or BMP) ',
            'beschrijving.required'     => 'Description required',
        ];

        $rules = [
            'name'          => 'required|max:40',
            'beschrijving'  => 'required|max:550|min:20',
            'thumbnail'     => 'required|mimes:jpeg,png,jng,bmp',
            'category_id'   => 'required',
            'level'         => 'required',
            'prijs'         => 'required|numeric',
            'status'        => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('author_video_create')
                ->withErrors($validator)
                ->withInput();
        }

        $destinationPath = base_path().'\public\videos\thumbnail';
        $fileName = str_random(20);
        $minetype = $request->file('thumbnail')->getClientOriginalExtension();

        $full_path = $fileName.'.'.$minetype;

        $request->file('thumbnail')->move($destinationPath, $full_path);

        //
        $this->new_video->author_id      =  Auth::user()->id;
        $this->new_video->category_id    =  $request->category_id;
        $this->new_video->name           =  $request->name;
        $this->new_video->video_key      =  str_random(20);
        $this->new_video->thumbnail      =  $full_path;
        $this->new_video->beschrijving   =  $request->beschrijving;
        $this->new_video->prijs          =  $request->prijs;
        $this->new_video->level          =  $request->level;
        $this->new_video->status         =  $request->status;

        $this->new_video->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('author_video_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::where('video_key', $id)->first();

        return view('author.video.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::where('video_key', $id)->first();

        return view('author.video.edit')->with('video', $video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
