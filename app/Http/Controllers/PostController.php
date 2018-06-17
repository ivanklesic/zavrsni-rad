<?php
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller{

    public function postCreatePost(Request $request){


        $this->validate($request,[
            'body' => 'required|max:5000',
            'title' => 'required|max:100'
        ]);

        $post = new Post();

        $post->body = $request['body'];
        $post->title = $request['title'];
        $msg = 'There was an error.';
        if($request->user()->posts()->save($post)){
            $msg = 'Post successfully created.';
        }
        return redirect()->route('posts')->with([
            'message' => $msg,
        ]);


    }

    public function getPosts(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts', ['posts' => $posts]);

    }

    public function getDeletePost($post_id){

        $post = Post::where('id' , $post_id)->first();
        $currentUser = Auth::user();
        if($currentUser != $post->user && !($currentUser->isAdmin())  ) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('posts')->with(['message' => 'Successfully deleted.']);
    }

    public function getCreatePost(){
        return view('createPost');
    }

    public function postEditPost(Request $request){
        $this->validate($request, [
           'body' => 'required|max:5000',
           'title' => 'required|max:100'
        ]);
        $post = Post::find($request['postid']);
        $currentUser = Auth::user();
        if($currentUser != $post->user && !($currentUser->isAdmin())  ) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->title = $request['title'];
        $post->update();
        return response()->json([
            'new_body' => $post->body,
            'new_title' => $post->title
        ], 200);

    }



}