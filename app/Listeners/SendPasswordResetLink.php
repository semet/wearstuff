<?php

namespace App\Listeners;

use App\Events\PasswordResetLinkRequested;
use App\Mail\PasswordResetMail;
use App\Models\PasswordRequest;
use DB;
use Hash;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use Mail;

class SendPasswordResetLink
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
     * @param  \App\Events\PasswordResetLinkRequested  $event
     * @return void
     */
    public function handle(PasswordResetLinkRequested $event)
    {
        $requests = PasswordRequest::where('email', $event->user->email)->get();
        if ($requests) {
            $requests->each(function (PasswordRequest $requests) {
                $requests->delete();
            });
        }
        $passwordReset = PasswordRequest::create([
            'email' => $event->user->email,
            'token' => Str::uuid(),
        ]);
        // Mail::to($event->user->email)->send(new PasswordResetMail($passwordReset));

        info('Anda telah meminta link untuk update password. Silakan ikuti link ini: ' . route('password.reset.show', $passwordReset->token));
        info('Jika anda tidak pernah melakukan permintaan ini, abaikan pesan ini.');
    }
}
