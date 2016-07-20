<?php

namespace App\Http\Controllers;

use App\Category;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    protected $category;
    protected $main_categories;

    public function __construct()
    {
        $this->category = Category::all();
        $this->main_categories = Category::where('cate_id', 0)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')->with('categories', $this->main_categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $name = str_replace('-', ' ', $name);

        $authors = DB::table('users')
            ->select('users.name')
            ->join('author', 'author.user_id', '=', 'users.id')
            ->join('videos', 'videos.author_id', '=', 'author.id')
            ->join('categories as c1', 'c1.id', '=', 'videos.category_id')
            ->join('categories as c2', 'c1.cate_id', '=', 'c2.cate_id')
            ->where('c2.name', $name)
            ->groupBy('users.name')
            ->get();
        
//        return $authors;
        $category = Category::where('name', $name)->first();

        $subCategories = Category::where('cate_id', $category->cate_id)->get();


        if($category->cate_id == 0){
            return view('courses.index_sub')
                ->with('category', $category);
        }
        return view('courses.index')
            ->with('category', $category)
            ->with('subCategories', $subCategories)
            ->with('authors', $authors);
    }
    
}
