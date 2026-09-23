<?php

namespace Tests\Feature;

use App\Models\Nombre;
use Tests\TestCase;

class NombreCrudTest extends TestCase
{
    public function test_nombre_can_be_created_read_updated_and_deleted(): void
    {
        $this->get('/nombres')->assertOk()->assertSee('No hay nombres registrados.');
        $this->get('/nombres/create')->assertOk()->assertSee('Crear nombre');
        $this->post('/nombres', ['nombre' => 'Ana'])->assertRedirect();
        $nombre = Nombre::sole();
        $this->assertDatabaseHas('nombres', ['id' => $nombre->id, 'nombre' => 'Ana']);
        $this->get('/nombres')->assertOk()->assertSee('Ana');
        $this->get("/nombres/{$nombre->id}")->assertOk()->assertSee('Ana');
        $this->get("/nombres/{$nombre->id}/edit")->assertOk()->assertSee('Ana');
        $this->put("/nombres/{$nombre->id}", ['nombre' => 'Maria'])->assertRedirect(route('nombres.show', $nombre));
        $this->assertDatabaseHas('nombres', ['id' => $nombre->id, 'nombre' => 'Maria']);
        $this->delete("/nombres/{$nombre->id}")->assertRedirect(route('nombres.index'));
        $this->assertDatabaseMissing('nombres', ['id' => $nombre->id]);
        $this->get("/nombres/{$nombre->id}")->assertNotFound();
    }

    public function test_invalid_names_are_rejected_when_creating_and_updating(): void
    {
        $this->post('/nombres', ['nombre' => 'Ana'])->assertRedirect();
        $nombre = Nombre::sole();
        foreach (['', ['invalid'], str_repeat('a', 256)] as $invalid) {
            $this->post('/nombres', ['nombre' => $invalid])->assertSessionHasErrors('nombre');
            $this->put("/nombres/{$nombre->id}", ['nombre' => $invalid])->assertSessionHasErrors('nombre');
        }
        $this->assertDatabaseCount('nombres', 1);
        $this->assertDatabaseHas('nombres', ['id' => $nombre->id, 'nombre' => 'Ana']);
    }

    public function test_names_are_escaped_in_views(): void
    {
        $name = '<script>alert(1)</script>';
        $this->post('/nombres', ['nombre' => $name])->assertRedirect();
        $nombre = Nombre::sole();
        foreach (['/nombres', "/nombres/{$nombre->id}", "/nombres/{$nombre->id}/edit"] as $url) {
            $this->get($url)->assertOk()->assertSee($name)->assertDontSee($name, false);
        }
    }

    public function test_names_are_paginated_ten_at_a_time(): void
    {
        for ($i = 1; $i <= 11; $i++) {
            $nombre = new Nombre;
            $nombre->nombre = 'Nombre '.str_pad((string) $i, 2, '0', STR_PAD_LEFT);
            $nombre->save();
        }

        $this->get('/nombres')->assertOk()->assertSee('Nombre 11')->assertDontSee('Nombre 01')->assertSee('page=2', false);
        $this->get('/nombres?page=2')->assertOk()->assertSee('Nombre 01')->assertDontSee('Nombre 11');
    }
}
