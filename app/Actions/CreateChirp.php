<?php

namespace App\Actions;

use App\Data\ChirpData;
use App\Models\User;

class CreateChirp
{
    // public function handle(Authenticatable $user, ChirpData $chirpData): void
    // {
    //     $user->chirps()->create($chirpData->toArray());
    // }
    
    public function handle(User $user, ChirpData $chirpData): void
    {
        $user->chirps()->create($chirpData->toArray());
    }
}
