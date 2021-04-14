<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tipoReserva;

class tipoReservaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tipo_reservas', $tipoReserva
        );

        $this->assertApiResponse($tipoReserva);
    }

    /**
     * @test
     */
    public function test_read_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tipo_reservas/'.$tipoReserva->id
        );

        $this->assertApiResponse($tipoReserva->toArray());
    }

    /**
     * @test
     */
    public function test_update_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->create();
        $editedtipoReserva = factory(tipoReserva::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tipo_reservas/'.$tipoReserva->id,
            $editedtipoReserva
        );

        $this->assertApiResponse($editedtipoReserva);
    }

    /**
     * @test
     */
    public function test_delete_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tipo_reservas/'.$tipoReserva->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tipo_reservas/'.$tipoReserva->id
        );

        $this->response->assertStatus(404);
    }
}
