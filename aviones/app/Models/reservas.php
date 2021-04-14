<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class reservas
 * @package App\Models
 * @version November 17, 2020, 3:00 am UTC
 *
 * @property integer $cliente_id
 * @property integer $vuelo_id
 * @property integer $tarifa_id
 * @property integer $avion_id
 * @property integer $tipoReserva_id
 * @property string $fecha
 * @property string $estado
 * @property integer $cantidad
 */
class reservas extends Model
{
    use SoftDeletes;

    public $table = 'reservas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'vuelo_id' => 'integer',
        'tarifa_id' => 'integer',
        'avion_id' => 'integer',
        'tipoReserva_id' => 'integer',
        'estado' => 'string',
        'cantidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
