<?php

namespace App\Listeners;

use App\Checkboxes;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleStateUpdate
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
    public function handle(object $event): void
    {
        $payload = json_decode($event->message);
        $data = $payload->data;

        if ($payload->event !== 'client-state') {
            return;
        }

        (new Checkboxes())->set($data->id, (int) $data->checked);
    }
}
