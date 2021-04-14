<?php

namespace App\Repositories;

use App\Models\tarifas;
use App\Repositories\BaseRepository;

/**
 * Class tarifasRepository
 * @package App\Repositories
 * @version November 17, 2020, 2:31 am UTC
*/

class tarifasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'precio',
        'descripcion'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tarifas::class;
    }
}
