<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tarifas;

class tarifasApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tarifas()
    {
        $tarifas = factory(tarifas::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tarifas', $tarifas
        );

        $this->assertApiResponse($tarifas);
    }

    /**
     * @test
     */
    public function test_read_tarifas()
    {
        $tarifas = factory(tarifas::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tarifas/'.$tarifas->id
        );

        $this->assertApiResponse($tarifas->toArray());
    }

    /**
     * @test
     */
    public function test_update_tarifas()
    {
        $tarifas = factory(tarifas::class)->create();
        $editedtarifas = factory(tarifas::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tarifas/'.$tarifas->id,
            $editedtarifas
        );

        $this->assertApiResponse($editedtarifas);
    }

    /**
     * @test
     */
    public function test_delete_tarifas()
    {
        $tarifas = factory(tarifas::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tarifas/'.$tarifas->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tarifas/'.$tarifas->id
        );

        $this->response->assertStatus(404);
    }
}
