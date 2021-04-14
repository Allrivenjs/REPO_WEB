<?php namespace Tests\Repositories;

use App\Models\reservas;
use App\Repositories\reservasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class reservasRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var reservasRepository
     */
    protected $reservasRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->reservasRepo = \App::make(reservasRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_reservas()
    {
        $reservas = factory(reservas::class)->make()->toArray();

        $createdreservas = $this->reservasRepo->create($reservas);

        $createdreservas = $createdreservas->toArray();
        $this->assertArrayHasKey('id', $createdreservas);
        $this->assertNotNull($createdreservas['id'], 'Created reservas must have id specified');
        $this->assertNotNull(reservas::find($createdreservas['id']), 'reservas with given id must be in DB');
        $this->assertModelData($reservas, $createdreservas);
    }

    /**
     * @test read
     */
    public function test_read_reservas()
    {
        $reservas = factory(reservas::class)->create();

        $dbreservas = $this->reservasRepo->find($reservas->id);

        $dbreservas = $dbreservas->toArray();
        $this->assertModelData($reservas->toArray(), $dbreservas);
    }

    /**
     * @test update
     */
    public function test_update_reservas()
    {
        $reservas = factory(reservas::class)->create();
        $fakereservas = factory(reservas::class)->make()->toArray();

        $updatedreservas = $this->reservasRepo->update($fakereservas, $reservas->id);

        $this->assertModelData($fakereservas, $updatedreservas->toArray());
        $dbreservas = $this->reservasRepo->find($reservas->id);
        $this->assertModelData($fakereservas, $dbreservas->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_reservas()
    {
        $reservas = factory(reservas::class)->create();

        $resp = $this->reservasRepo->delete($reservas->id);

        $this->assertTrue($resp);
        $this->assertNull(reservas::find($reservas->id), 'reservas should not exist in DB');
    }
}
