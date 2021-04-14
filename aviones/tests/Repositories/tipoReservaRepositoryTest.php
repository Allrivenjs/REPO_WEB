<?php namespace Tests\Repositories;

use App\Models\tipoReserva;
use App\Repositories\tipoReservaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tipoReservaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tipoReservaRepository
     */
    protected $tipoReservaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoReservaRepo = \App::make(tipoReservaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->make()->toArray();

        $createdtipoReserva = $this->tipoReservaRepo->create($tipoReserva);

        $createdtipoReserva = $createdtipoReserva->toArray();
        $this->assertArrayHasKey('id', $createdtipoReserva);
        $this->assertNotNull($createdtipoReserva['id'], 'Created tipoReserva must have id specified');
        $this->assertNotNull(tipoReserva::find($createdtipoReserva['id']), 'tipoReserva with given id must be in DB');
        $this->assertModelData($tipoReserva, $createdtipoReserva);
    }

    /**
     * @test read
     */
    public function test_read_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->create();

        $dbtipoReserva = $this->tipoReservaRepo->find($tipoReserva->id);

        $dbtipoReserva = $dbtipoReserva->toArray();
        $this->assertModelData($tipoReserva->toArray(), $dbtipoReserva);
    }

    /**
     * @test update
     */
    public function test_update_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->create();
        $faketipoReserva = factory(tipoReserva::class)->make()->toArray();

        $updatedtipoReserva = $this->tipoReservaRepo->update($faketipoReserva, $tipoReserva->id);

        $this->assertModelData($faketipoReserva, $updatedtipoReserva->toArray());
        $dbtipoReserva = $this->tipoReservaRepo->find($tipoReserva->id);
        $this->assertModelData($faketipoReserva, $dbtipoReserva->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tipo_reserva()
    {
        $tipoReserva = factory(tipoReserva::class)->create();

        $resp = $this->tipoReservaRepo->delete($tipoReserva->id);

        $this->assertTrue($resp);
        $this->assertNull(tipoReserva::find($tipoReserva->id), 'tipoReserva should not exist in DB');
    }
}
