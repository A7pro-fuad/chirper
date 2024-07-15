<?php

namespace Tests\Unit;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ChirpActionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_chirp_delete_action_work_correctly(): void
    {
        // Arrange
        $userId = 1;
        $chirpId = 1;

        // Act
        $user = \App\Models\User::factory()->create(['id' => $userId]);
        $this->assertInstanceOf(\App\Models\User::class, $user);

        $chirp = \App\Models\Chirp::factory()->create(['user_id' => $userId, 'id' => $chirpId]);
        $this->assertInstanceOf(\App\Models\Chirp::class, $chirp);

        $action = new \App\Actions\DeleteChirp();
        $this->assertInstanceOf(\App\Actions\DeleteChirp::class, $action);

        try {
            $action->handle($user, $chirp);
        } catch (\Exception $e) {
            $this->fail('Exception thrown: ' . $e->getMessage());
        }
    }
}
