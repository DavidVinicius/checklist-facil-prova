<?php
namespace App\Services;

use App\Http\Resources\CakeResource;
use App\Models\Cake;
use App\Repositories\CakeRepository;

class CakeService
{
    public function getCake($id)
    {
        $cake = Cake::findOrFail($id);        
        return new CakeResource($cake);
    }
    
    public function getActiveCakes()
    {
        return CakeResource::collection((new CakeRepository)->getActiveCakes());
    }

    public function createCake($cake)
    {
        $cake = Cake::firstOrCreate($cake);
        return new CakeResource($cake);
    }
    
    public function updateCake($cake_id, $cake_data)
    {
        $cake = Cake::findOrFail($cake_id);
        $cake->fill($cake_data);
        $cake->save();

        return new CakeResource($cake);
    }

    public function destroyCake($id)
    {
        $cake = Cake::findOrFail($id);
        return $cake->delete();
    }

    public function cakeExists($cake_id)
    {
        return (new CakeRepository)->exists($cake_id);
    }
}