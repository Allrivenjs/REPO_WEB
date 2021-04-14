<?php

namespace App\Repositories;

use App\Models\tipoReserva;
use App\Repositories\BaseRepository;

/**
 * Class tipoReservaRepository
 * @package App\Repositories
 * @version November 17, 2020, 2:29 am UTC
*/

class tipoReservaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
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
        return tipoReserva::class;
    }
}
