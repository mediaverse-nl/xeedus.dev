<?php

namespace App\Http\Controllers\Author;

use Auth;

use App\Author;
use App\User;

use Validator;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BiographyController extends Controller
{

    protected $author;

    public function __construct()
    {
        $this->author = Author::where('user_id', Auth::user()->id)->first();
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.biography.index')->with('author', $this->author);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('author.biography.show')->with('author', $this->author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('author.biography.edit')->with('author', $this->author);
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

}
