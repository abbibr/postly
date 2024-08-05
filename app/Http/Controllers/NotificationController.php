<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    public function index(User $user)
    {
        $notifications = $user->notifications()->unread()->latest()->get();

        return view('notifications.index', [
            'notifications' => $notifications
        ]);
    }

    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return back();
    }
}
