<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\avions;

class avionsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_avions()
    {
        $avions = factory(avions::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/avions', $avions
        );

        $this->assertApiResponse($avions);
    }

    /**
     * @test
     */
    public function test_read_avions()
    {
        $avions = factory(avions::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/avions/'.$avions->id
        );

        $this->assertApiResponse($avions->toArray());
    }

    /**
     * @test
     */
    public function test_update_avions()
    {
        $avions = factory(avions::class)->create();
        $editedavions = factory(avions::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/avions/'.$avions->id,
            $editedavions
        );

        $this->assertApiResponse($editedavions);
    }

    /**
     * @test
     */
    public function test_delete_avions()
    {
        $avions = factory(avions::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/avions/'.$avions->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/avions/'.$avions->id
        );

        $this->response->assertStatus(404);
    }
}
