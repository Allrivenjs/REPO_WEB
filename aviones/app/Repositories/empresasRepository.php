<?php

namespace App\Repositories;

use App\Models\empresas;
use App\Repositories\BaseRepository;

/**
 * Class empresasRepository
 * @package App\Repositories
 * @version November 17, 2020, 2:27 am UTC
*/

class empresasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'companie',
        'nit',
        'correo',
        'representante',
        'telefono',
        'direccion'
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
        return empresas::class;
    }
}
