<?php

namespace App\Http\Controllers\Auth;

use App\Review;
use App\Video;

use Validator;
use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{

    protected $review;

    public function __construct()
    {
        $this->review = new Review;
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = $this->review->where('user_id', $this->user->id)->get();

        return view('auth.review.index')
            ->with('reviews', $review);
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
            'tekst.required' => 'tekst',
            'rating.required' => 'rating',
        ];

        $rules = [
            'tekst'     => 'required|max:255',
            'rating'     => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('video_show', $request->segment)
                ->withErrors($validator)
                ->withInput();
        } else {

            $video = Video::where('video_key', $request->segment)->first();

            $this->review->user_id      = Auth::user()->id;
            $this->review->video_id     = $video->id;
            $this->review->tekst        = $request->tekst;
            $this->review->rating       = $request->rating;

            $this->review->save();

            \Session::flash('succes_message', 'successfully.');

            return redirect()->route('video_show', $request->segment);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
