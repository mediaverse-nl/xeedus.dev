<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use Validator;

use Log;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $category;

    public function __construct()
    {
        $this->category = new Category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')->with('categories', $this->category->where('cate_id', 0)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        ];

        $rules = [
            'name'     => 'required|max:25',
            'category_id'     => 'required|max:20',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
//            log::error('.');

            return redirect()
                ->route('admin_category_create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $this->category->name = $request->name;
            $this->category->cate_id = $request->category_id;
            $this->category->save();

            Log::info('made new category', ['name' => $request->name]);

            return redirect()->route('admin_category_all');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $cate = Category::where('name', str_replace('-', ' ', $category) )->first();

        return view('admin.category.edit')->with('cate', $cate);
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
        $category = Category::find($request->id);

        $messages = [
            'regex' => 'Can only contain A-Z a-z'
        ];

        $rules = [
            'name'     => 'required|max:25|regex:/^[A-Za-z \t]*$/i',
            'id'     => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_category_edit', $category->name)
                ->withErrors($validator)
                ->withInput();
        } else {

            $category->name = $request->name;

            $category->save();

            \Session::flash('succes_message','successfully.');

            return redirect()->route('admin_category_all');
        }
    }

}
