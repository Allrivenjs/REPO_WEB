<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tipoReserva
 * @package App\Models
 * @version November 17, 2020, 2:29 am UTC
 *
 * @property string $titulo
 * @property string $descripcion
 */
class tipoReserva extends Model
{
    use SoftDeletes;

    public $table = 'tipo_reservas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'titulo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titulo' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
