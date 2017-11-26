<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ContactsWasImported
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $skipped_contacts;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($skipped_contacts)
    {
        $this->skipped_contacts = $skipped_contacts;
    }

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
