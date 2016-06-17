<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\User;

use Validator;
use Session;
use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();

        return view('admin.author.index')->with('authors', $author); //$author;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::where('id', $id)->first();
        
        return view('admin.author.show')->with('author', $author);
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
        $messages = [
            'biography.required'        => '',
        ];

        $rules = [
            'biography'          => 'required|max:500',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_authors_show', $request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $author = Author::where('id', $request->id)->first();

        $author->verified  =  $request->verified;

        $author->save();

        $user = Auth::user();

        if($request->verified == 'on'){
            $user->role = 'author';
        }else{
            $user->role = 'user';
        }
        $user->save();

        \Session::flash('succes_message','successfully.');


        return redirect()->route('admin_authors_all');
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
