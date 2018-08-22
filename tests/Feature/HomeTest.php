<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeTest extends TestCase
{
  use DatabaseMigrations;

  /**
   * @test
   */
  public function usuario_no_logueado_redireccionado()
  {
    $response = $this->get('/');

    $response->assertStatus(302);
  }

  /**
   * @test
   */
  public function usuario_logueado_accede_a_home()
  {
    $this->signIn();

    $response = $this->get('/');

    $response->assertStatus(200);
  }
}
