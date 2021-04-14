<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\reservas;

class reservasApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_reservas()
    {
        $reservas = factory(reservas::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/reservas', $reservas
        );

        $this->assertApiResponse($reservas);
    }

    /**
     * @test
     */
    public function test_read_reservas()
    {
        $reservas = factory(reservas::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/reservas/'.$reservas->id
        );

        $this->assertApiResponse($reservas->toArray());
    }

    /**
     * @test
     */
    public function test_update_reservas()
    {
        $reservas = factory(reservas::class)->create();
        $editedreservas = factory(reservas::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/reservas/'.$reservas->id,
            $editedreservas
        );

        $this->assertApiResponse($editedreservas);
    }

    /**
     * @test
     */
    public function test_delete_reservas()
    {
        $reservas = factory(reservas::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/reservas/'.$reservas->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/reservas/'.$reservas->id
        );

        $this->response->assertStatus(404);
    }
}
