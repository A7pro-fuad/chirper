<?php

namespace App\Actions;

use App\Models\User;
use App\Models\Chirp;

class UpdateChirp
{
    public function handle(User $user, Chirp $chirp, $validated): void
    {
        $chirp->update($validated);
    }
}
