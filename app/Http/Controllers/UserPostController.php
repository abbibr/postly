<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Cache, DB;

class UserPostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->latest()->paginate(5);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function testLock() {
        $check = Cache::lock('demoTestingLock', 5);

        if($check->get()) {
            return 'success';
        }
        else {
            return 'error';
        }
    }
}
