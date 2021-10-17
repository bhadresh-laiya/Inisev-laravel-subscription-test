<?php

namespace App\Listeners;

use App\Events\PostAdded;
use App\Mail\SendMailWhenPostAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubscriberEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostAdded  $event
     * @return void
     */
    public function handle(PostAdded $event)
    {
        \Mail::to($event->user->email)->send(
            new SendMailWhenPostAdded($event->user, $event->post)
        );
    }
}
