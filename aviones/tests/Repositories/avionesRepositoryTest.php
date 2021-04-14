<?php namespace Tests\Repositories;

use App\Models\aviones;
use App\Repositories\avionesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class avionesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var avionesRepository
     */
    protected $avionesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->avionesRepo = \App::make(avionesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_aviones()
    {
        $aviones = factory(aviones::class)->make()->toArray();

        $createdaviones = $this->avionesRepo->create($aviones);

        $createdaviones = $createdaviones->toArray();
        $this->assertArrayHasKey('id', $createdaviones);
        $this->assertNotNull($createdaviones['id'], 'Created aviones must have id specified');
        $this->assertNotNull(aviones::find($createdaviones['id']), 'aviones with given id must be in DB');
        $this->assertModelData($aviones, $createdaviones);
    }

    /**
     * @test read
     */
    public function test_read_aviones()
    {
        $aviones = factory(aviones::class)->create();

        $dbaviones = $this->avionesRepo->find($aviones->id);

        $dbaviones = $dbaviones->toArray();
        $this->assertModelData($aviones->toArray(), $dbaviones);
    }

    /**
     * @test update
     */
    public function test_update_aviones()
    {
        $aviones = factory(aviones::class)->create();
        $fakeaviones = factory(aviones::class)->make()->toArray();

        $updatedaviones = $this->avionesRepo->update($fakeaviones, $aviones->id);

        $this->assertModelData($fakeaviones, $updatedaviones->toArray());
        $dbaviones = $this->avionesRepo->find($aviones->id);
        $this->assertModelData($fakeaviones, $dbaviones->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_aviones()
    {
        $aviones = factory(aviones::class)->create();

        $resp = $this->avionesRepo->delete($aviones->id);

        $this->assertTrue($resp);
        $this->assertNull(aviones::find($aviones->id), 'aviones should not exist in DB');
    }
}
