<?php

namespace App\Repositories;

use App\Models\aviones;
use App\Repositories\BaseRepository;

/**
 * Class avionesRepository
 * @package App\Repositories
 * @version November 17, 2020, 2:36 am UTC
*/

class avionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigoid',
        'empresa_id',
        'modelo',
        'capacidad',
        'disponibilidad',
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
        return aviones::class;
    }
}
