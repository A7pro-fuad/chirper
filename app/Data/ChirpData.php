<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class ChirpData extends Data
{

    public function __construct(
        #[Max(255)]
        public string $message
    ) {
    }
}
