<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostCreated;
use App\Models\User;

class IncremnetUserPosts
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
        $userId = $event->post->user_id;
        $user = User::find($userId);

            $user->posts_count++;
            $user->save();

    }
}
