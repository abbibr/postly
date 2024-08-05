<?php

namespace App\Http\Controllers;

use App\Notifications\CreatePostNotification;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\PostCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeleteMail;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        # Bu boshlang`ich holatidagi til turini chiqaradi (en)
        // dump(App::currentLocale());

        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'body' => 'required|max:255',
        ]);

        $post = $req->user()->posts()->create([
            'body' => $req->body
        ]);

        PostCreated::dispatch($post);

        // $req->user()->notify(new CreatePostNotification($post));
        Notification::send($req->user(), new CreatePostNotification($post));

        return back()->with('post', 'Post created successfully!');
    }

    /* public function likes(){
        $posts = Post::find(38);
        $users = User::find(7);
        dd($posts->likes[0]->user_id);
    } */

    public function destroy(Request $req, Post $post)
    {
        /* if($post->ownedBy($req->user())){
            $post->delete();
            return back();
        }
        else{
            return response(null, 409);
        } */

        $this->authorize('delete', $post);

        $post->delete();

        $user = $post->user->name;
        $text = $post->body;
        $deleted_time = $post->deleted_at;

        Log::alert("Post o`chirildi: -> \n" .
            "Post: " . $text . "\n" .
            "User: " . $user . "\n" .
            "O`chirilgan vaqt: " . $deleted_time);

        Mail::to(auth()->user()->email)
            ->send(new DeleteMail($post));

        return back();
    }

    public function archive(User $user)
    {
        # O`chirilgan va mavjud postlani hammasini oladi
        // $archives = $user->posts()->withTrashed()->get();

        $posts = $user->posts()->onlyTrashed()->orderByDesc('deleted_at')->get();
        $user_id = $user->id;

        return view('users.posts.archive', [
            'posts' => $posts,
            'user_id' => $user_id
        ]);
    }

    public function restore(Request $req, Post $post)
    {
        $post->restore();
        return redirect()->back()->with('restore', 'Your post is successfully restored.');
    }

    public function deleteForever(Post $post, Request $req)
    {
        if($post->trashed())
        {
            $post->forceDelete();
            return back()->with('forceDelete', 'You deleted your post forever!');
        }
    }

    public function edit(Request $req, Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $req, Post $post)
    {
        /* $this->validate($req, [
            'body' => 'required'
        ]); */

        $this->authorize('update', $post);

        $post->update([
            'user_id' => $post->user->id,
            'body' => $req->body
        ]);

        $user = $post->user->name;
        $text = $post->body;

        Log::warning("Post o`zgartirildi: -> \n" .
            "Post: " . $text . "\n" .
            "User: " . $user);

        return redirect()->route('posts')->with('update', 'Post updated successfully!');
    }
}
