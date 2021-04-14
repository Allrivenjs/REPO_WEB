<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\aviones;

class avionesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_aviones()
    {
        $aviones = factory(aviones::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/aviones', $aviones
        );

        $this->assertApiResponse($aviones);
    }

    /**
     * @test
     */
    public function test_read_aviones()
    {
        $aviones = factory(aviones::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/aviones/'.$aviones->id
        );

        $this->assertApiResponse($aviones->toArray());
    }

    /**
     * @test
     */
    public function test_update_aviones()
    {
        $aviones = factory(aviones::class)->create();
        $editedaviones = factory(aviones::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/aviones/'.$aviones->id,
            $editedaviones
        );

        $this->assertApiResponse($editedaviones);
    }

    /**
     * @test
     */
    public function test_delete_aviones()
    {
        $aviones = factory(aviones::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/aviones/'.$aviones->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/aviones/'.$aviones->id
        );

        $this->response->assertStatus(404);
    }
}
