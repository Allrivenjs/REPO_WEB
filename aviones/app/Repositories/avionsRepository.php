<?php

namespace App\Repositories;

use App\Models\avions;
use App\Repositories\BaseRepository;

/**
 * Class avionsRepository
 * @package App\Repositories
 * @version November 15, 2020, 12:25 am UTC
*/

class avionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'empresa',
        'tipo',
        'capacidad',
        'longitud',
        'velocidad',
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
        return avions::class;
    }
}
