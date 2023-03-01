<?php

namespace Tests\Unit;

use Tests\TestCase;

class MascotasTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_mascotas(): void
    {
       $response = $this->get('mascotas');
       $response->assertStatus(200);
    }
}

?>