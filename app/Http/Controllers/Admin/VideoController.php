<?php

namespace App\Http\Controllers\Admin;

use App\Video;

use Validator;
use Storage;
use File;
use Response;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
//use Request;

//use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\File;
//use Illuminate\Http\Response;


class VideoController extends Controller
{
    protected $videos;

    public function __construct()
    {
        $this->videos = new Video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.video.index')->with('videos', $this->videos->paginate(20));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.video.edit')->with('video', $this->videos->find($id));
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
        $messages = [

        ];
        $rules = [
//            'status'          => 'required',
//            'thumbnails'          => 'required|mimes:mp4,webm',
//            'video'          => 'required|mimes:mp4,webm',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_videos_edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $video = $this->videos->find($id);

        $image = $request->file('thumbnails');
        $video_file = $request->file('video');

        if($image){
            $extension = $image->getClientOriginalExtension();
            $new_filename = str_random(10).'.'.$extension;
            Storage::disk('local')->put($new_filename, \Input::file('thumbnails'));
            $video->thumbnails =  $new_filename;
        }

        if($video_file){
            $extension_v = $video_file->getClientOriginalExtension();
            $new_filename_v = str_random(10).'.'.$extension_v;
//            Storage::disk('local')->put($new_filename_v,  file_get_contents($video_file->getRealPath()));
            Storage::disk('local')->put($new_filename_v, Input::file('video'));
            $video->video =  $new_filename_v;
        }

        $video->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_videos_edit', $id);
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
