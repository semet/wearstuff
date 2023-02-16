<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\EmailVerificationMail;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendEmailVerification
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
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // Mail::to($event->user->email)->send(new EmailVerificationMail($event->user));
        $verification = $event->user
            ->emailVerifications()
            ->create([
                'expires_at' => Carbon::now()->addMinutes(5)
            ]);
        info('please follow this link to verify your email ' . route('register.verify.email', $verification->id));
    }
}
