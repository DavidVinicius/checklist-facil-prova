<?php

namespace App\Jobs;

use App\Mail\CakeAvaliableMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CakeAvaliableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    
    private $mail;
    private $email_address;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CakeAvaliableMail $mail, $email_address)
    {
      $this->mail = $mail;
      $this->email_address = $email_address;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email_address)->send($this->mail);
    }
}
