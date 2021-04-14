<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\vuelos;

class vuelosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vuelos()
    {
        $vuelos = factory(vuelos::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vuelos', $vuelos
        );

        $this->assertApiResponse($vuelos);
    }

    /**
     * @test
     */
    public function test_read_vuelos()
    {
        $vuelos = factory(vuelos::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vuelos/'.$vuelos->id
        );

        $this->assertApiResponse($vuelos->toArray());
    }

    /**
     * @test
     */
    public function test_update_vuelos()
    {
        $vuelos = factory(vuelos::class)->create();
        $editedvuelos = factory(vuelos::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vuelos/'.$vuelos->id,
            $editedvuelos
        );

        $this->assertApiResponse($editedvuelos);
    }

    /**
     * @test
     */
    public function test_delete_vuelos()
    {
        $vuelos = factory(vuelos::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vuelos/'.$vuelos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vuelos/'.$vuelos->id
        );

        $this->response->assertStatus(404);
    }
}
