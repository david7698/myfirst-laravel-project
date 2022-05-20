<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\NewBookAdded;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class NewBookNotification
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
     * @param  \App\Events\NewBookAdded  $event
     * @return void
     */
    public function handle(NewBookAdded $event)
    {

        $users = User::first();

        Notification::send($users,new BookNotification($event->book));
    }
}
