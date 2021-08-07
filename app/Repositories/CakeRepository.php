<?php
namespace App\Repositories;

use App\Models\Cake;

class CakeRepository
{
    public function getActiveCakes()
    {
        return Cake::where("is_active", true)->get();
    }
}