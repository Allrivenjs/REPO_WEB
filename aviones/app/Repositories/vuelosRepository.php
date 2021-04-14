<?php

namespace App\Repositories;

use App\Models\vuelos;
use App\Repositories\BaseRepository;

/**
 * Class vuelosRepository
 * @package App\Repositories
 * @version November 17, 2020, 2:44 am UTC
*/

class vuelosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origen',
        'destino',
        'fecha'
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
        return vuelos::class;
    }
}
