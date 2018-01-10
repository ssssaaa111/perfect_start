<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ThreadCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $thread;

    /**
     * ThreadCreated constructor.
     * @param $thread
     */
    public function __construct($thread)
    {
        $this->thread = $thread;
    }
    /**
     * Create a new event instance.
     *
     * @return void
     */


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
