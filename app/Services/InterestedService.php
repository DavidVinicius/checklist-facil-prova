<?php
namespace App\Services;

use App\Http\Resources\InterestedResource;
use App\Notifications\EmailNotification;
use App\Repositories\CakeRepository;
use App\Repositories\InterestedRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InterestedService
{
    public function subscribe($cake_id, $email)
    {
        $cakeRepository = new CakeRepository;
        
        if ($cakeRepository->cakeNotExists($cake_id)) throw new ModelNotFoundException("Bolo não existe ou está indisponível");
        
        $resource = new InterestedResource((new InterestedRepository)->subscribe($cake_id, $email));

        if ($cakeRepository->isCakeAvaliable($cake_id)) $this->sendEmailCakeAvaliableNotification($cake_id, $email);

        return $resource;
    }
    
    public function unsubscribe($cake_id, $email)
    {
        return (new InterestedRepository)->unsubscribe($cake_id, $email);
    }

    public function sendEmailCakeAvaliableNotification($cake_id, $email)
    {
        return (new NotificationService)->send(new EmailNotification($cake_id, $email));
    }
    
}