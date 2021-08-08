<?php
namespace App\Services;

use App\Interfaces\INotification;

class NotificationService
{
    public function send(INotification $notification)
    {
        return $notification->send();
    }    
    
}