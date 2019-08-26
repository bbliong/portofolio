<?php

namespace App\Http\Controllers;

use App\Work;
use App\Blog;
use App\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $works = Work::with('kategori')->get();
        $blogs = Blog::with('kategori')->take(4)->get();
        return view("home", compact(['kategoris', 'works' , 'blogs']));
    }

    public function work($slug){
        $work = Work::with('images')->where('slug', $slug)->first();
        if ($work == null) {
            return view(404);
        }
        return view("detail-work", compact('work'));
    }

    public function blog($slug){
        $blog = Blog::where('slug', $slug)->first();
        $blogs = Blog::with('Kategori')->take(3)->get();
        if ($blog == null) {
            return view(404);
        }
        return view("detail-blog", compact('blog', 'blogs'));
    }
}
