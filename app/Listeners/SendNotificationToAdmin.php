<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNotificationToAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        $user = $event->post->user->name;
        $text = $event->post->body;
        $created_at = $event->post->created_at;

        Log::info("Post muvaffaqqiyatli yaratildi: -> \n" . 
                "Post: " . $text . "\n" . 
                "User: " . $user . "\n" . 
                "Post qo`yilgan vaqt: " . $created_at);
    }
}
