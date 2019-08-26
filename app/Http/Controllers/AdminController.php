<?php

namespace App\Http\Controllers;

use App\Work;
use App\Blog;
use App\Image;
use App\Kategori;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
    use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
    	return view('dasar');
    }

    public function work(){
        $works = Work::with(['Kategori'])->where('active', 1)->get();
        return view('work', compact('works'));
    }

    public function createWork(){
        $kategoris = Kategori::all();
        return view('create-work', compact('kategoris'));
    }

    public function storeWork(Request $request){

         $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
              return redirect()->back();
        }

        $path = "";
        if($request->thumbnail !== null){  
            $uploadedFile = $request->file('thumbnail');        
            $path = $uploadedFile->storeAs('public/work', $request->title . "." . $request->thumbnail->getClientOriginalExtension());
        }

        $work = Work::create([
            'url' => $request->url, 
            'title' => $request->title, 
            'slug' => Str::slug($request->title, "-"), 
            'description' => $request->description, 
            'kategori_id' => $request->kategori, 
            'thumbnail' =>  $path
        ]);  

        return redirect()->route('work');
    }   

     public function editWork($id){
        $work = Work::with('images')->where('id', $id)->first();
        $kategoris = Kategori::all();
        return view('update-work', compact(['kategoris', 'work']));
    }

    public function updateWork(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
              return redirect()->back();
        }

        $path = "";
        if($request->thumbnail !== null){  
            $uploadedFile = $request->file('thumbnail');        
            $path = $uploadedFile->storeAs('public/work', $request->title . "." . $request->thumbnail->getClientOriginalExtension());
        }


        $cek = Work::where('id', $request->id)->first();

        $cek->url = $request->url;
        $cek->title = $request->title;
        $cek->slug = Str::slug($request->title, "-"); 
        $cek->description = $request->description;
        $cek->kategori_id = $request->kategori;

        if($path !== ""){
              $cek->thumbnail = $path;
        }

        $cek->save();

        return redirect('admin/work');
    }



    public function deleteWork(Request $request, $id){
        $cek = Work::where('id', $id);
        $delete = $cek->delete();
        return redirect()->route('work');
    }


    public function blog(){
        $blogs = Blog::with(['Kategori'])->where('active', 1)->get();
        return view('blog',compact('blogs'));
    }


    public function createBlog(){
        $kategoris = Kategori::all();
        return view('create-blog', compact('kategoris'));
    }


    public function storeBlog(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
              return redirect()->back();
        }

        $path = "";
        if($request->thumbnail !== null){  
            $uploadedFile = $request->file('thumbnail');        
            $path = $uploadedFile->storeAs('public/blog', $request->title . "." . $request->thumbnail->getClientOriginalExtension());
        }

        $blog = Blog::create([
            'title' => $request->title, 
             'slug' => Str::slug($request->title, "-"),
            'detail' => $request->description, 
            'kategori_id' => $request->kategori, 
            'thumbnail' =>  $path
        ]);  


        return redirect('admin/blog');
    }


    public function editBlog($id){
        $blog = Blog::with('images')->where('id', $id)->first();
        $kategoris = Kategori::all();
        return view('update-blog', compact(['kategoris', 'blog']));
    }

    public function updateBlog(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
              return redirect()->back();
        }

        $path = "";
        if($request->thumbnail !== null){  
            $uploadedFile = $request->file('thumbnail');        
            $path = $uploadedFile->storeAs('public/blog', $request->title . "." . $request->thumbnail->getClientOriginalExtension());
        }


        $cek = Blog::where('id', $request->id)->first();

        $cek->title = $request->title;
        $cek->slug = Str::slug($request->title, "-"); 
        $cek->detail = $request->description;
        $cek->kategori_id = $request->kategori;

        if($path !== ""){
              $cek->thumbnail = $path;
        }

        $cek->save();

        return redirect('admin/blog');
    }



    public function deleteBlog(Request $request, $id){
        $cek = Blog::where('id', $id);
        $delete = $cek->delete();
        return redirect('admin/blog');
    }


    // Images Upload 

     public function ImagesStore(Request $request)
    {
        $count = Image::where('work_id', $request->work_id)->get()->count();

        // Cek apakah foto sudah ada 8 
        if($count <= 7){
            $uploadedFile = $request->file('file'); 
            $path = $uploadedFile->storeAs('public/work/image', $request->file->getClientOriginalName());
            
           $Image = Image::create([
                'url' => $path, 
                'work_id' => $request->work_id, 
            ]); 
            return response()->json(['img'=>$path, 'id' =>$request->work_id ]);
        }else{
            return response()->json(['error'=>"Sudah 8 foto, silahkan hapus terlebih dahulu"]);
        }

     
    }

    public function ImagesDelete(Request $request)
    {
        $id =  $request->id;
        $data = Image::where('id',$id)->first();
        $removeImage = Storage::delete($data->url);

        if($removeImage){
            $data->delete();
        }
        
        return $data;
    }

}
