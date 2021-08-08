<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CakeAvaliableMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $cake;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cake)
    {        
        $this->cake = $cake;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.cake-avaliable', [
            "cake" => $this->cake
        ]);
    }
}
