<?php namespace Tests\Repositories;

use App\Models\empresas;
use App\Repositories\empresasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class empresasRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var empresasRepository
     */
    protected $empresasRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->empresasRepo = \App::make(empresasRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_empresas()
    {
        $empresas = factory(empresas::class)->make()->toArray();

        $createdempresas = $this->empresasRepo->create($empresas);

        $createdempresas = $createdempresas->toArray();
        $this->assertArrayHasKey('id', $createdempresas);
        $this->assertNotNull($createdempresas['id'], 'Created empresas must have id specified');
        $this->assertNotNull(empresas::find($createdempresas['id']), 'empresas with given id must be in DB');
        $this->assertModelData($empresas, $createdempresas);
    }

    /**
     * @test read
     */
    public function test_read_empresas()
    {
        $empresas = factory(empresas::class)->create();

        $dbempresas = $this->empresasRepo->find($empresas->id);

        $dbempresas = $dbempresas->toArray();
        $this->assertModelData($empresas->toArray(), $dbempresas);
    }

    /**
     * @test update
     */
    public function test_update_empresas()
    {
        $empresas = factory(empresas::class)->create();
        $fakeempresas = factory(empresas::class)->make()->toArray();

        $updatedempresas = $this->empresasRepo->update($fakeempresas, $empresas->id);

        $this->assertModelData($fakeempresas, $updatedempresas->toArray());
        $dbempresas = $this->empresasRepo->find($empresas->id);
        $this->assertModelData($fakeempresas, $dbempresas->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_empresas()
    {
        $empresas = factory(empresas::class)->create();

        $resp = $this->empresasRepo->delete($empresas->id);

        $this->assertTrue($resp);
        $this->assertNull(empresas::find($empresas->id), 'empresas should not exist in DB');
    }
}
