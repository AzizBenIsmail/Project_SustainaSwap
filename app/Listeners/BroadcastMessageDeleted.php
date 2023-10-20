<?php

namespace App\Listeners;

use App\Events\MessageDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BroadcastMessageDeleted
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
     * @param  object  $event
     * @return void
     */
    public function handle(MessageDeletedEvent $event)
{
    // Use broadcasting to inform other users that a message was deleted
    broadcast(new MessageDeleted($event->messageId))->toOthers();
}

}
