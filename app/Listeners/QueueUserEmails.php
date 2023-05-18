<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueueUserEmails implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $loggedInUserId = $event->user->id;

        // Fetch all users except the logged-in user
        $users = User::where('id', '!=', $loggedInUserId)->get();

        // Iterate through each user and dispatch the SendEmailJob
        foreach ($users as $user) {
            // Set the necessary email details
            $subject = 'Your Subject';
            $body = 'Your Email Body';
            $recipientEmail = $user->email;
            
            // Dispatch the SendEmailJob for each user
            SendEmailJob::dispatch($subject, $body, $recipientEmail)
                ->onQueue('emails'); // Example delay, adjust as needed
        }
    }
}
