<?php
namespace App\Repositories;

use App\Models\Cake;

class CakeRepository
{
    public function getActiveCakes()
    {
        return Cake::where("is_active", true)->get();
    }

    public function exists($cake_id)
    {
        $cake = Cake::find($cake_id);

        return $cake !== null && $cake->is_active === true;
    }
    
    public function cakeNotExists($cake_id)
    {
        $cake = Cake::find($cake_id);

        return $cake === null || $cake->is_active === false;
    }

    public function isCakeAvaliable($cake_id)
    {
        $cake = Cake::findOrFail($cake_id);

        return $cake->quantity > 0;
    }
}