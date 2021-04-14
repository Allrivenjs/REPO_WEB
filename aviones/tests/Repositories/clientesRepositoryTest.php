<?php namespace Tests\Repositories;

use App\Models\clientes;
use App\Repositories\clientesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class clientesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var clientesRepository
     */
    protected $clientesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientesRepo = \App::make(clientesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_clientes()
    {
        $clientes = factory(clientes::class)->make()->toArray();

        $createdclientes = $this->clientesRepo->create($clientes);

        $createdclientes = $createdclientes->toArray();
        $this->assertArrayHasKey('id', $createdclientes);
        $this->assertNotNull($createdclientes['id'], 'Created clientes must have id specified');
        $this->assertNotNull(clientes::find($createdclientes['id']), 'clientes with given id must be in DB');
        $this->assertModelData($clientes, $createdclientes);
    }

    /**
     * @test read
     */
    public function test_read_clientes()
    {
        $clientes = factory(clientes::class)->create();

        $dbclientes = $this->clientesRepo->find($clientes->id);

        $dbclientes = $dbclientes->toArray();
        $this->assertModelData($clientes->toArray(), $dbclientes);
    }

    /**
     * @test update
     */
    public function test_update_clientes()
    {
        $clientes = factory(clientes::class)->create();
        $fakeclientes = factory(clientes::class)->make()->toArray();

        $updatedclientes = $this->clientesRepo->update($fakeclientes, $clientes->id);

        $this->assertModelData($fakeclientes, $updatedclientes->toArray());
        $dbclientes = $this->clientesRepo->find($clientes->id);
        $this->assertModelData($fakeclientes, $dbclientes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_clientes()
    {
        $clientes = factory(clientes::class)->create();

        $resp = $this->clientesRepo->delete($clientes->id);

        $this->assertTrue($resp);
        $this->assertNull(clientes::find($clientes->id), 'clientes should not exist in DB');
    }
}
