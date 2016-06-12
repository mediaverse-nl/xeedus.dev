<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Validator;
use App\Author;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthorController extends Controller
{

    protected $authors;
    protected $author;

    public function __construct()
    {
        $this->author = new Author;
        $this->authors = Author::all();
        $this->this_author  = Author::where('user_id', Auth::user()->id)->first();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = Author::where('status', '=', 'unverified')->get();

        return view('admin.author.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create')->with('user', $this->this_author);
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
            'image.required' => 'Select a profile image',
            'image.mimes' => 'file type must be (JPEG, PNG, JNG or BMP) ',
            'bank_number.regex' => 'Iban is not formated right ( NL91 ABNA 0417 1643 00 )',

        ];

        $rules = [
            'biography'     => 'required|max:255',
            'bank_credentials'     => 'required|max:255',
            'bank_number'     => array('regex:/^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/'),
            'image'     => 'required|mimes:jpeg,png,jng,bmp'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('author_create')
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {

                    $destinationPath = base_path().'\public\images';
                    $fileName = str_random(20);
                    $minetype = $request->file('image')->getClientOriginalExtension();

                    $full_path = $fileName.'.'.$minetype;

                    $request->file('image')->move($destinationPath, $full_path);

                }else{

                    Session::flash('error', 'uploaded file is not valid');
                    return redirect()->route('author_create');
                }
            }

            $this->author->user_id              = Auth::user()->id;
            $this->author->biography            = $request->biography;
            $this->author->image                = $full_path;
            $this->author->bank_credentials     = $request->bank_credentials;
            $this->author->bank_number          = $request->bank_number;
            $this->author->status               = "unverified";
            $this->author->user_id              =  Auth::user()->id;//$request->bank_number;

            $this->author->save();

            \Session::flash('succes_message','successfully.');

            return redirect()->route('author_create');
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
}
