<?php namespace Tests\Repositories;

use App\Models\matieres;
use App\Repositories\matieresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakematieresTrait;
use Tests\ApiTestTrait;

class matieresRepositoryTest extends TestCase
{
    use MakematieresTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var matieresRepository
     */
    protected $matieresRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->matieresRepo = \App::make(matieresRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_matieres()
    {
        $matieres = $this->fakematieresData();
        $createdmatieres = $this->matieresRepo->create($matieres);
        $createdmatieres = $createdmatieres->toArray();
        $this->assertArrayHasKey('id', $createdmatieres);
        $this->assertNotNull($createdmatieres['id'], 'Created matieres must have id specified');
        $this->assertNotNull(matieres::find($createdmatieres['id']), 'matieres with given id must be in DB');
        $this->assertModelData($matieres, $createdmatieres);
    }

    /**
     * @test read
     */
    public function test_read_matieres()
    {
        $matieres = $this->makematieres();
        $dbmatieres = $this->matieresRepo->find($matieres->id);
        $dbmatieres = $dbmatieres->toArray();
        $this->assertModelData($matieres->toArray(), $dbmatieres);
    }

    /**
     * @test update
     */
    public function test_update_matieres()
    {
        $matieres = $this->makematieres();
        $fakematieres = $this->fakematieresData();
        $updatedmatieres = $this->matieresRepo->update($fakematieres, $matieres->id);
        $this->assertModelData($fakematieres, $updatedmatieres->toArray());
        $dbmatieres = $this->matieresRepo->find($matieres->id);
        $this->assertModelData($fakematieres, $dbmatieres->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_matieres()
    {
        $matieres = $this->makematieres();
        $resp = $this->matieresRepo->delete($matieres->id);
        $this->assertTrue($resp);
        $this->assertNull(matieres::find($matieres->id), 'matieres should not exist in DB');
    }
}
