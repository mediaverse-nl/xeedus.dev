<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Video;
use App\Author;

use Auth;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{

    protected $order;
    protected $user;

    public function __construct()
    {
        $this->order = New Order;
        $this->user = User::find(Auth::user()->id);
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

        $messages = [
            'prijs.min' => 'you are ('.str_replace('-', '', Auth::user()->credits - $video->prijs).') credits short',
        ];

        $rules = [
            'prijs' => 'required|integer|min:'.$video->prijs,
        ];

        $validator = Validator::make(array('prijs' => $this->user->credits), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('credits_index')
                ->withErrors($validator)
                ->withInput();
        } else {

            $this->user->credits = $this->user->credits - $video->prijs;
            $this->user->save();

            $this->order->user_id = Auth::user()->id;
            $this->order->video_id = $video->id;
            $this->order->save();

            $author = Author::find($video->author->id);
            $author->credit_bank = $author->credit_bank + $video->prijs;
            $author->save();

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
