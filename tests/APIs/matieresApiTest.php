<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakematieresTrait;
use Tests\ApiTestTrait;

class matieresApiTest extends TestCase
{
    use MakematieresTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_matieres()
    {
        $matieres = $this->fakematieresData();
        $this->response = $this->json('POST', '/api/matieres', $matieres);

        $this->assertApiResponse($matieres);
    }

    /**
     * @test
     */
    public function test_read_matieres()
    {
        $matieres = $this->makematieres();
        $this->response = $this->json('GET', '/api/matieres/'.$matieres->id);

        $this->assertApiResponse($matieres->toArray());
    }

    /**
     * @test
     */
    public function test_update_matieres()
    {
        $matieres = $this->makematieres();
        $editedmatieres = $this->fakematieresData();

        $this->response = $this->json('PUT', '/api/matieres/'.$matieres->id, $editedmatieres);

        $this->assertApiResponse($editedmatieres);
    }

    /**
     * @test
     */
    public function test_delete_matieres()
    {
        $matieres = $this->makematieres();
        $this->response = $this->json('DELETE', '/api/matieres/'.$matieres->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/matieres/'.$matieres->id);

        $this->response->assertStatus(404);
    }
}
