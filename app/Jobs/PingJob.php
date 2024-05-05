<?php

namespace App\Jobs;

use App\Mail\MailOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $user;

    public function __construct($user)
    {
        echo $user['id'];
        //
        $this->user = $user;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        echo $this->user;
        Mail::to($this->user['email'])->send(new MailOrder());

        //
    }
}
