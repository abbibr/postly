<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->latest()->paginate(20);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
