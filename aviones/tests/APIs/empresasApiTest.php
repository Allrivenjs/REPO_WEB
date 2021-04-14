<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\empresas;

class empresasApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_empresas()
    {
        $empresas = factory(empresas::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/empresas', $empresas
        );

        $this->assertApiResponse($empresas);
    }

    /**
     * @test
     */
    public function test_read_empresas()
    {
        $empresas = factory(empresas::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/empresas/'.$empresas->id
        );

        $this->assertApiResponse($empresas->toArray());
    }

    /**
     * @test
     */
    public function test_update_empresas()
    {
        $empresas = factory(empresas::class)->create();
        $editedempresas = factory(empresas::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/empresas/'.$empresas->id,
            $editedempresas
        );

        $this->assertApiResponse($editedempresas);
    }

    /**
     * @test
     */
    public function test_delete_empresas()
    {
        $empresas = factory(empresas::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/empresas/'.$empresas->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/empresas/'.$empresas->id
        );

        $this->response->assertStatus(404);
    }
}
