<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $req, Post $post){
        if(!$post->likedBy($req->user())){
            $post->likes()->create([
                'user_id' => $req->user()->id,
                'post_id' => $post->id
            ]);

            return back();
        }
        else{
            return response(null, 409);
        }
    }

    public function destroy(Request $req, Post $post){
        $post->likes()->where('user_id', $req->user()->id)->delete();
        
        return back();
    }
}
