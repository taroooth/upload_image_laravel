<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
      $image=Post::all();

      return view('index', compact('image'));
    }

    public function store(Request $request){
      $request->validate([
         'image'=>'required|image|mimes:jpg,jpeg,png|max:2000'
     ]);

     $file=$request->file('image');
     $fileName=Str::random(20).'.'.$file->getClientOriginalExtension();
     Image::make($file)->save(public_path('storage/images/'.$fileName));
     $post=new Post;
     $post->image=$fileName;
     $post->save();

     return redirect()->back();
    }

    public function searchId(Request $request) {
        $image = Post::find($request->id);
        return view('search', compact('image'));
    }

    public function updateId(Request $request) {
        $request->validate([
            'image'=>'required|image|mimes:jpg,jpeg,png|max:2000'
        ]);
   
        $file=$request->file('image');
        $fileName=Str::random(20).'.'.$file->getClientOriginalExtension();
        Image::make($file)->save(public_path('storage/images/'.$fileName));
        $post=Post::find($request->id);
        $post->image=$fileName;
        $post->save();
   
        // return redirect('/index');
        return view('search', ['image' => $post]);
    }

    
    // public function searchDate(Request $request) {
    //     // $date = $request->updated_at;
    //     // $image = Post::where('updated_at', $date)->get();

    //     // return view('index',compact('image'));
    //     if (!empty($request['from']) && !empty($request['until'])) {
    //         $image = Post::getImage($request['from'], $request['until']);
    //         print('searchDate true');
    //     } else {
    //         //リクエストデータがなければそのままで表示
    //         $image = Post::get();
    //         print('searchDate false');
    //     }
    //     return view('index',compact('image'));
    // }

    public function deleteId(Request $request)
    {
        Post::where('id', $request->id)->delete();

        return redirect('/index');
    }
}
