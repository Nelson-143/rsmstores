<?php

namespace app\Listeners;

use Illuminate\Auth\Events\Login;
use Spatie\Activitylog\Models\Activity;

class LogUserLoginActivity
{
    public function __construct()
    {
        //
    }

    public function handle(Login $event)
    {
        activity()
->causedBy($event->user->id)           
->log('Logged in');
    }
}
