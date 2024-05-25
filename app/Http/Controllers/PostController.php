<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','DESC');
        if(request()->has('search')){
            $posts = $posts->where('content','like','%'.request()->get('search','').'%');
        }

        return view('MainPage/home',[
            'posts'=> $posts ->paginate(5)
        ]);
    }
    public function store(){

        request()->validate([
            'tweet'=>'required|min:5|max:240'
        ]);
        $post = new Post([
            'content' => request()->get('tweet', ''),
            'likes' => rand(0,100)
        ]);
        $post->user_id = auth()->user()->user_id;
        $post->save();

        return redirect()->route('home');
    }
    public function destroy(Post $post_id) {
        $post_id->delete();
        return redirect()->route('home');
    }
    public function show(Post $post_id){

        return view('show_tweet',[
            'post'=>$post_id
        ]);
    }
    public function edit(Post $post_id){

        return view('edit_tweet',[
            'post'=>$post_id
        ]);
    }
    public function update($post_id){
        $post = Post::findOrFail($post_id);

        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $post->content = request()->get('content', '');
        $post->save();

        return redirect()->route('home',$post->post_id);
    }

}
