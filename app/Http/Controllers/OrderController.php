<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Video;

use Auth;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{

    protected $order;
    protected $user_credits;

    public function __construct()
    {
        $this->order = New Order;
        $this->user_credits = Auth::user()->credits;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $video = Video::where('video_key', $request->video_key)->first();

        if($this->user_credits >= $video->prijs){
//            $messages = [
//                'image.required' => 'Select a profile image',
//            ];
//
//            $rules = [
//                'biography'     => 'required|max:255',
//            ];
        }
//        Validator::extend('foo', function($attribute, $value, $parameters)
//        {
//            return $value == 'foo';
//        });

//        $validator = Validator::make(array('' => ,), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('video_show', $request->video_key)
                ->withErrors($validator)
                ->withInput();
        } else {

            $this->order->user_id =  Auth::user()->id;

            $this->order->save();

            \Session::flash('succes_message','successfully.');

            return redirect()->route('order_store', $request->video_key);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
