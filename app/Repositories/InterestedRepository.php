<?php
namespace App\Repositories;

use App\Models\Interested;

class InterestedRepository
{
    public function subscribe($cake_id, $email)
    {
        return Interested::firstOrCreate([
            "email" => $email,
            "cake_id" => $cake_id
        ]);
    }
    
    
    public function unsubscribe($cake_id, $email)
    {
        return Interested::where([
            "email" => $email,
            "cake_id" => $cake_id
        ])->delete();        
    }
}