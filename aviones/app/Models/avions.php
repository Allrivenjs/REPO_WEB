<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class avions
 * @package App\Models
 * @version November 15, 2020, 12:25 am UTC
 *
 * @property string $empresa
 * @property string $tipo
 * @property integer $capacidad
 * @property number $longitud
 * @property number $velocidad
 * @property string $descripcion
 */
class avions extends Model
{
    use SoftDeletes;

    public $table = 'avions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'empresa',
        'tipo',
        'capacidad',
        'longitud',
        'velocidad',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'empresa' => 'string',
        'tipo' => 'string',
        'capacidad' => 'integer',
        'longitud' => 'float',
        'velocidad' => 'float',
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
