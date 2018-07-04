<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use DB;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	//dd($todos)

    	return view('post.index',['posts' => $posts]);
    }

    public function index2()
    {
        $posts = Post::all();
        //dd($todos)

        return view('post.update',['posts' => $posts]);
    }

    public function updatePost(Request $request , $id)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        ]);//限制照片副檔名及大小
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
        $t = Storage::disk('public')->put($imageName, file_get_contents($image), 'public');
        $imageName = Storage::disk('local')->url($imageName);
   
        $user = Auth::user();
       
        $post=post::find($id);
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->content = $request->content;
        $post->photo_url=$imageName; //將照片網址存入photo_url中
        $post->save();    
       // return $post->photo_url;
        return redirect('home');
        }
/*

     public function update(Request $request)
    {
        $user = Auth::user();
        $validated =  $request->validate([
    		'content' => 'required|max:5',
		]);
      
		
		//$todo = Todo::create($request->all()) 只能用在Todo中 有設定的變數上
    	return redirect('post');
    }
    */

    public function updatePhoto(Request $request)
    {   $user_id=Auth::id();
        $post = post::find($request->id);
      //  $posts = post::all();
       
       // return $posts;
        return view('post.update',compact('post','user_id'));
    }


    public function upload(Request $request)
    {
        $files = $request->file('file'); 
        if(!empty($files)):
            foreach ($files as $file):
                Storage::put($file->getClientOriginalName(),file_get_contents($file));
            endforeach;
        endif;   
        return \Response::json(array('success' => true));              
    }

    public function update()
    {
        return redirect('home'); 
    }


    public function imageUploadPost(Request $request) //store
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        ]);//限制照片副檔名及大小
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
        $t = Storage::disk('public')->put($imageName, file_get_contents($image), 'public');
        $imageName = Storage::disk('local')->url($imageName);
   
        $user = Auth::user();
       
        $post=new Post;
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->content = $request->content;
        $post->photo_url=$imageName; //將照片網址存入photo_url中
        $post->save();
        
        $id = $post->id;
       // return $post->photo_url;
        return redirect('home');
        }
        
    public function imageUpload()
    {
        return redirect('home'); 
    }


    public function destory(Request $request , Post $post)
    {
        $post->delete();
        return redirect('home');
    }

  

	public function __construct()
	{
    	$this->middleware('auth');
	}

  }




