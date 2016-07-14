<?php

namespace App\Http\Controllers\Auth;

use Mollie;

use App\User;
use App\CreditOrder;

use Auth;
use Validator;
use Config;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

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
//        $mollie = new Mollie_API_Client;
//        $mollie->setApiKey("test_dHar4XY7LxsDOtmnkVtjNVWXLSlXsM");
        $payment = Mollie::api()->payments()->get($id);
//
        $msg = '';
//
//        if ($payment->isPaid())
//        {
//            $msg .= "Payment received.";
//        }
        // List Methods
        $methods = \Mollie::getMethods()->all();

        foreach ($methods as $method)
        {
            $msg .=  '<div style="line-height:40px; vertical-align:top">';
            $msg .=  '<img src="' . htmlspecialchars($method->image->normal) . '"> ';
            $msg .=  htmlspecialchars($method->description);
            $msg .=  ' (' .  htmlspecialchars($method->id). ')';
            $msg .=  '</div>';
        }

        return view('auth.credits.show')->with('creditOrder', $this->order->find($id))->with('msg', $msg);
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
    
    
    public function mollie($paymentId){

        $payment = Mollie::api()->payments()->get($paymentId);

        if ($payment->isPaid())
        {

            return 'paid';
            /*
             * At this point you'd probably want to start the process of delivering the product
             * to the customer.
             */
        }
        elseif (! $payment->isOpen())
        {
            return 'not paid yet';
            /*
             * The payment isn't paid and isn't open anymore. We can assume it was aborted.
             */
        }
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
                ->route('credits_index')
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

            $order = $this->order;

//            \Session::flash('succes_message', 'asd');

//            return redirect()->route('credits_show', $order_id);

            $payment = Mollie::api()->payments()->create([
                "amount"      => $order->price,
                "description" => "My first API payment",
                "redirectUrl" => route('credits_mollie', array($order->id)),
            ]);

            $payment = Mollie::api()->payments()->get($payment->id);

            return redirect($payment->getPaymentUrl());
//            return redirect()->route('credits_show', $payment->id);


        }
    }

}
