<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\User;

use Input;
use App\Video;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    protected $category;
    protected $main_categories;
    protected $video;

    public function __construct()
    {
        $this->category = new Category();
        $this->main_categories = Category::where('cate_id', 0)->get();
        $this->video = new Video();
        $this->users = new User();;
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


        $videos = Video::where(function($q) {

            $price = Input::has('price') ? Input::get('price') : $price = null;
            $level = Input::has('level') ? Input::get('level') : null;
            $author = Input::has('author') ? Input::get('author') : null;

            if($price) {
                $price = explode(',', $price);
                $q->where('prijs', '>=', $price[0]);
                $q->where('prijs', '<=', $price[1]);
            }

        })->get();

        dd($videos);

//
//        $name = str_replace('-', ' ', $name);
//        $subCategories = $this->category->where('name', $name)->first();
//
//        $users = $this->users;
////        $users = $subCategories->video->author->where('category_id', $subCategories->id)->get();
//
//        $videos = $this->video->where(function($q) use ($users){
//
////            $max = Input::has('max') ? Input::get('max') : $max = 0;
//
//            $price = Input::has('price') ? Input::get('price') : $price = null;
//            $level = Input::has('level') ? Input::get('level') : null;
//            $author = Input::has('author') ? Input::get('author') : null;
//
//            if($price) {
//                $price = explode(',', $price);
//                $q->where('prijs', '>=', $price[0]);
//                $q->where('prijs', '<=', $price[1]);
//            }
//
//            if(isset($level)) {
//                foreach ($level as $genre) {
//                    $q->where('level', '=', $genre);
//                    $q->orWhere('level', '=', $genre);
//                }
//            }
//
//
////            if(isset($level)){
//////                foreach ($level as $lvl) {
//////                    $q->orWhere('prijs','>=',$price[0]);
//////                    $q->where('prijs','<=',$price[1]);
////                    $q->whereIn('level', [$level])->get();
//////                }
////            }
//
////            $q->where('category_id', $subCategories->id)->get()
//
////            if($price){
////                $price = explode(',', $price);
////
////                if(isset($level)){
////                    foreach ($level as $lvl) {
////                        $query->orWhere('prijs','>=',$price[0]);
////                        $query->where('prijs','<=',$price[1]);
////                        $query->where('level','=', $lvl);
////                    }
////                }
////                $query->where('prijs','>=',$price[0]);
////                $query->where('prijs','<=',$price[1]);
////
////                if (isset($author)){
////                    foreach ($author as $auth){
////                        $user = $users->where('name', $auth)->first();
////                        $query->where('author_id', $user->author->id);
////                    }
////                }
////            }
//
//        })->get();
//            ->where('category_id', $subCategories->id)->get();

//        $authors = DB::table('users')
//            ->select('users.name')
//            ->join('author', 'author.user_id', '=', 'users.id')
//            ->join('videos', 'videos.author_id', '=', 'author.id')
//            ->join('categories as c1', 'c1.id', '=', 'videos.category_id')
//            ->join('categories as c2', 'c1.cate_id', '=', 'c2.cate_id')
//            ->where('c2.name', $name)
//            ->groupBy('users.name')
//            ->get();

//        return $authors;
        $category = Category::where('name', str_replace('-', ' ', $name))->first();

        $subCategories = Category::where('cate_id', $category->cate_id)->get();


        if($category->cate_id == 0){
            return view('courses.index_sub')
                ->with('category', $category);
        }

        return view('courses.index')
            ->with('category', $category)
            ->with('videos', $videos)
            ->with('subCategories', $subCategories->children)
            ->with('authors', $subCategories->video->first());
    }
    
}
