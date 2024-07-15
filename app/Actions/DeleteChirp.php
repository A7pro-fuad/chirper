<?php

namespace App\Actions;

use App\Data\ChirpData;
use App\Models\User;
use App\Models\chirp;

class DeleteChirp
{
    /**
     * Create a new class instance.
     */
    public function handle(User $user, Chirp $chirp): void
    {
        $chirp->delete();
    }
}
