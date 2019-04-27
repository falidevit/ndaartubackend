<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\matieres;
use App\Repositories\matieresRepository;

trait MakematieresTrait
{
    /**
     * Create fake instance of matieres and save it in database
     *
     * @param array $matieresFields
     * @return matieres
     */
    public function makematieres($matieresFields = [])
    {
        /** @var matieresRepository $matieresRepo */
        $matieresRepo = \App::make(matieresRepository::class);
        $theme = $this->fakematieresData($matieresFields);
        return $matieresRepo->create($theme);
    }

    /**
     * Get fake instance of matieres
     *
     * @param array $matieresFields
     * @return matieres
     */
    public function fakematieres($matieresFields = [])
    {
        return new matieres($this->fakematieresData($matieresFields));
    }

    /**
     * Get fake data of matieres
     *
     * @param array $matieresFields
     * @return array
     */
    public function fakematieresData($matieresFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $matieresFields);
    }
}
