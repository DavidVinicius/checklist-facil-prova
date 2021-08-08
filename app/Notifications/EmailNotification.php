<?php
namespace App\Notifications;

use App\Interfaces\INotification;
use App\Jobs\CakeAvaliableJob;
use App\Mail\CakeAvaliableMail;
use App\Models\Cake;

class EmailNotification implements INotification
{
    private $cake;
    private $email;

    public function __construct($cake_id, $email)
    {
        $this->email = $email;
        $this->cake = Cake::find($cake_id);
    }

    public function send()
    {        
        CakeAvaliableJob::dispatch(new CakeAvaliableMail($this->cake), $this->email)
        ->delay(now()->addMinute(5));
    }
}