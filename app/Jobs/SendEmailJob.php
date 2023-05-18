<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\EmailJob;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $subject;
    private $body;
    private $recipientEmail;
    private $emailStatusId;
    // Add other necessary information

    public function __construct(string $subject, string $body, string $recipientEmail, string $emailStatusId)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->recipientEmail = $recipientEmail;
        $this->emailStatusId = $emailStatusId;
    }

    public function handle()
    {
        $email = new \stdClass();
        $email->subject = $this->subject;
        $email->body = $this->body;
        $email->recipientEmail = $this->recipientEmail;
        try {
            $this->updateEmailJobStatus('processing');
            Mail::send([], [], function ($message) use ($email) {
                Log::info('iskogyi',[$email->recipientEmail]);
                $message->to($email->recipientEmail)
                    ->subject($email->subject)
                    ->setBody($email->body);

            });
            $this->updateEmailJobStatus('sent');
        } catch (\Exception $e) {
            $this->updateEmailJobStatus('failed');
            throw $e;
        }
    }

    private function updateEmailJobStatus($status)
    {
        EmailJob::where('recipient_email', $this->recipientEmail)
                ->update(['status' => $status]);
    }
}
