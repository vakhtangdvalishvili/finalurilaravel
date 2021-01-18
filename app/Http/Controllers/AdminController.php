<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;
use App\Post;
use File;
use Auth;

class AdminController extends Controller
{
    //public function index(){
    //    $items=items::simplePaginate(request('perPage', 5));

      //  return view('welcome',['items'=>$items]);


   // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
        //$records = DB::table('post')->get();

        return view('post');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:3',
            'add_date' => 'required',
            'image' => 'required',
            'price' => 'required'


        ]);
        if(Input::file("image")){
            $dp=public_path('images');
            $filename=uniqid().".jpg";
            $image=Input::file("image")->move($dp, $filename);
        }

    	$post_id = Post::create([
            'user_id'=> Auth::user()->id,
            'category_id'=> $request->input('category_id'),
            'title'=> $request->input('title'),
            'image'=> $filename,
            'price'=> $request->input('price'),
            'add_date'=> $request->input('add_date')
        ])['id'];


    }

    public function Category()
    {
        return view('category');
    }


    public function store_category(Request $request)
    {
        $request -> validate([
            'title' => 'required|min:2|max:15'
        ]);
        return Category::create([
            'title'=>$request->input('title')
        ]);
    }
    //public function delete($post_id)
    //{
      //  Post::destroy($post_id);

    //}
}
