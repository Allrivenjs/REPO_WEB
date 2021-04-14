<?php namespace Tests\Repositories;

use App\Models\avions;
use App\Repositories\avionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class avionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var avionsRepository
     */
    protected $avionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->avionsRepo = \App::make(avionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_avions()
    {
        $avions = factory(avions::class)->make()->toArray();

        $createdavions = $this->avionsRepo->create($avions);

        $createdavions = $createdavions->toArray();
        $this->assertArrayHasKey('id', $createdavions);
        $this->assertNotNull($createdavions['id'], 'Created avions must have id specified');
        $this->assertNotNull(avions::find($createdavions['id']), 'avions with given id must be in DB');
        $this->assertModelData($avions, $createdavions);
    }

    /**
     * @test read
     */
    public function test_read_avions()
    {
        $avions = factory(avions::class)->create();

        $dbavions = $this->avionsRepo->find($avions->id);

        $dbavions = $dbavions->toArray();
        $this->assertModelData($avions->toArray(), $dbavions);
    }

    /**
     * @test update
     */
    public function test_update_avions()
    {
        $avions = factory(avions::class)->create();
        $fakeavions = factory(avions::class)->make()->toArray();

        $updatedavions = $this->avionsRepo->update($fakeavions, $avions->id);

        $this->assertModelData($fakeavions, $updatedavions->toArray());
        $dbavions = $this->avionsRepo->find($avions->id);
        $this->assertModelData($fakeavions, $dbavions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_avions()
    {
        $avions = factory(avions::class)->create();

        $resp = $this->avionsRepo->delete($avions->id);

        $this->assertTrue($resp);
        $this->assertNull(avions::find($avions->id), 'avions should not exist in DB');
    }
}
