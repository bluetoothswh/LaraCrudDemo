<?php

namespace App\Listeners;

use App\Events\CreateLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Log;
class CreateLogListen
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
     * @param  CreateLog  $event
     * @return void
     */
    public function handle(CreateLog $event)
    {
        return Log::create([
            'content'   => $event->content,
            'add_time'  => time(),
        ]);
    }
}
