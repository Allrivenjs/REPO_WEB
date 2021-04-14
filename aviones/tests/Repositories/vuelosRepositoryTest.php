<?php namespace Tests\Repositories;

use App\Models\vuelos;
use App\Repositories\vuelosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class vuelosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var vuelosRepository
     */
    protected $vuelosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vuelosRepo = \App::make(vuelosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vuelos()
    {
        $vuelos = factory(vuelos::class)->make()->toArray();

        $createdvuelos = $this->vuelosRepo->create($vuelos);

        $createdvuelos = $createdvuelos->toArray();
        $this->assertArrayHasKey('id', $createdvuelos);
        $this->assertNotNull($createdvuelos['id'], 'Created vuelos must have id specified');
        $this->assertNotNull(vuelos::find($createdvuelos['id']), 'vuelos with given id must be in DB');
        $this->assertModelData($vuelos, $createdvuelos);
    }

    /**
     * @test read
     */
    public function test_read_vuelos()
    {
        $vuelos = factory(vuelos::class)->create();

        $dbvuelos = $this->vuelosRepo->find($vuelos->id);

        $dbvuelos = $dbvuelos->toArray();
        $this->assertModelData($vuelos->toArray(), $dbvuelos);
    }

    /**
     * @test update
     */
    public function test_update_vuelos()
    {
        $vuelos = factory(vuelos::class)->create();
        $fakevuelos = factory(vuelos::class)->make()->toArray();

        $updatedvuelos = $this->vuelosRepo->update($fakevuelos, $vuelos->id);

        $this->assertModelData($fakevuelos, $updatedvuelos->toArray());
        $dbvuelos = $this->vuelosRepo->find($vuelos->id);
        $this->assertModelData($fakevuelos, $dbvuelos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vuelos()
    {
        $vuelos = factory(vuelos::class)->create();

        $resp = $this->vuelosRepo->delete($vuelos->id);

        $this->assertTrue($resp);
        $this->assertNull(vuelos::find($vuelos->id), 'vuelos should not exist in DB');
    }
}
