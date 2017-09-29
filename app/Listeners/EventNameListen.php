<?php

namespace App\Listeners;

use App\Events\EventName;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventNameListen
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
     * @param  EventName  $event
     * @return void
     */
    public function handle(EventName $event)
    {
        //
    }
}
