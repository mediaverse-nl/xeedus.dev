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

    public function __construct()
    {
        $this->user = User::find(Auth::user()->id);
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

            \Session::flash('succes_message','successfully.');

            return redirect()->route('credits_show');
        }
    }

}
