<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AboutTest extends TestCase
{
  use DatabaseMigrations;

  /**
   * @test
   */
  public function cualquiera_puede_ver_pagina_about()
  {
      $response = $this->get('/about');

      $response->assertStatus(200);
  }
}
