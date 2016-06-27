<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use Validator;
use Input;
use Session;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{

    protected $user;
    protected $this_user;

    public function __construct()
    {
        $this->users = User::all();
        $this->this_user = Auth::user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.profile.show')->with('user', $this->this_user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('auth.profile.edit')->with('user', $this->this_user);
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

        $messages = [
            'b_name.required' => 'please fill Broadcast Name field',
        ];

        $rules = [
            'voornaam' => 'max:255',
            'tussenvoegsel' => 'max:255',
            'achternaam' => 'max:255',
            'geslacht' => 'max:255',
            'land' => 'max:255',
            'stad' => 'max:255',
            'postcode' => 'max:255',
            'straatnaam' => 'max:255',
            'huisnummer' => 'max:255',
            'geboortedatum' => 'max:255',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('profile_edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $this->this_user->voornaam      = $request->voornaam;
            $this->this_user->tussenvoegsel = $request->tussenvoegsel;
            $this->this_user->achternaam    = $request->achternaam;
            $this->this_user->geslacht      = $request->geslacht;
            $this->this_user->land          = $request->land;
            $this->this_user->stad          = $request->stad;
            $this->this_user->postcode      = $request->postcode;
            $this->this_user->straatnaam    = $request->straatnaam;
            $this->this_user->huisnummer    = $request->huisnummer;
            $this->this_user->geboortedatum = $request->geboortedatum;

            $this->this_user->save();

            \Session::flash('succes_message','successfully saved.');

            return redirect()->route('profile_show');
        }

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
