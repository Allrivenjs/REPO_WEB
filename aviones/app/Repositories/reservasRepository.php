<?php

namespace App\Repositories;

use App\Models\reservas;
use App\Repositories\BaseRepository;

/**
 * Class reservasRepository
 * @package App\Repositories
 * @version November 17, 2020, 3:00 am UTC
*/

class reservasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliente_id',
        'vuelo_id',
        'tarifa_id',
        'avion_id',
        'tipoReserva_id',
        'fecha',
        'estado',
        'cantidad'
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
        return reservas::class;
    }
}
