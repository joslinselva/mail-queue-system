<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emailData;

    public $tries = 5;

    public function backoff()
    {
        return [30, 60, 120]; // Delay in seconds for each retry
    }

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function handle()
    {
        Mail::to($this->emailData['email'])->send(new NotificationMail($this->emailData));
    }

    public function failed(Exception $exception)
    {
        // Log failure or notify admin
    }
}
