<?php namespace Tests\Repositories;

use App\Models\tarifas;
use App\Repositories\tarifasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tarifasRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tarifasRepository
     */
    protected $tarifasRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tarifasRepo = \App::make(tarifasRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tarifas()
    {
        $tarifas = factory(tarifas::class)->make()->toArray();

        $createdtarifas = $this->tarifasRepo->create($tarifas);

        $createdtarifas = $createdtarifas->toArray();
        $this->assertArrayHasKey('id', $createdtarifas);
        $this->assertNotNull($createdtarifas['id'], 'Created tarifas must have id specified');
        $this->assertNotNull(tarifas::find($createdtarifas['id']), 'tarifas with given id must be in DB');
        $this->assertModelData($tarifas, $createdtarifas);
    }

    /**
     * @test read
     */
    public function test_read_tarifas()
    {
        $tarifas = factory(tarifas::class)->create();

        $dbtarifas = $this->tarifasRepo->find($tarifas->id);

        $dbtarifas = $dbtarifas->toArray();
        $this->assertModelData($tarifas->toArray(), $dbtarifas);
    }

    /**
     * @test update
     */
    public function test_update_tarifas()
    {
        $tarifas = factory(tarifas::class)->create();
        $faketarifas = factory(tarifas::class)->make()->toArray();

        $updatedtarifas = $this->tarifasRepo->update($faketarifas, $tarifas->id);

        $this->assertModelData($faketarifas, $updatedtarifas->toArray());
        $dbtarifas = $this->tarifasRepo->find($tarifas->id);
        $this->assertModelData($faketarifas, $dbtarifas->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tarifas()
    {
        $tarifas = factory(tarifas::class)->create();

        $resp = $this->tarifasRepo->delete($tarifas->id);

        $this->assertTrue($resp);
        $this->assertNull(tarifas::find($tarifas->id), 'tarifas should not exist in DB');
    }
}
