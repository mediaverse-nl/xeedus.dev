<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\CreditOrder;

use Auth;
use Validator;
use Config;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{

    protected $user;
    protected $order;
    protected $status;

    protected $currency = [
        ['id' => '442-244-55', 'price' => 10.00, 'credits' => 100],
        ['id' => '442-244-56', 'price' => 20.00, 'credits' => 200],
        ['id' => '442-244-57', 'price' => 50.00, 'credits' => 500],
        ['id' => '442-244-58', 'price' => 75.00, 'credits' => 750],
        ['id' => '442-244-59', 'price' => 100.00, 'credits' => 1000],
    ];

    public function __construct()
    {
        $this->order = new CreditOrder;
        $this->user = User::find(Auth::user()->id);
        $this->status = 'open';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.credits.index');
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
    public function update(Request $request)
    {

        $this->user->credits = $this->user->credits + $request->order;
        $this->user->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'order' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('credits_show')
                ->withErrors($validator)
                ->withInput();
        } else {

            $item = collect($this->currency)
                ->where('id', $request->order);

            $this->order->user_id   = Auth::user()->id;
            $this->order->credits   = $item->implode('credits');
            $this->order->price     = $item->implode('price');
            $this->order->status    = $this->status;

            $this->order->save();

            \Session::flash('succes_message', 'asd');

            return redirect()->route('credits_show');
        }
    }

}
