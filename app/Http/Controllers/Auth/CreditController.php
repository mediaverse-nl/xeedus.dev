<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Auth;
use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{

    protected $user;
    protected $currency = array();

    public function __construct()
    {
        $this->user = User::find(Auth::user()->id);

        $this->currency = [
            '442-244-55' => [
                'price' => '10,00', 'credits' => '100'
            ],
            '442-244-56' => [
                'price' => '20,00', 'credits' => '200'
            ],
            '442-244-57' => [
                'price' => '50,00', 'credits' => '500'
            ],
            '442-244-58' => [
                'price' => '75,00', 'credits' => '750'
            ],
            '442-244-59' => [
                'price' => '100,00', 'credits' => '1000'
            ]
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.credits.index')->with('currency', $this->currency);
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
        $rules = [
            'amount' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('credits_show')
                ->withErrors($validator)
                ->withInput();
        } else {

            $this->user->credits = $this->user->credits + $request->amount;
            $this->user->save();

            \Session::flash('succes_message', 'successfully.');

            return redirect()->route('credits_show');
        }
    }

}
