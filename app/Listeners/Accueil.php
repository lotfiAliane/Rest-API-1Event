<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Events\Accueil as AccueilEvent;
class Accueil
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
    public function handle(AccueilEvent $event)
    {
        //

      /*  DB::table('visits')->insert([
            'ip' => request()->ip(),
        ]);
        */
    }
}
