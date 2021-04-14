<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class aviones
 * @package App\Models
 * @version November 17, 2020, 2:36 am UTC
 *
 * @property string $codigoid
 * @property integer $empresa_id
 * @property string $modelo
 * @property integer $capacidad
 * @property integer $disponibilidad
 * @property string $descripcion
 */
class aviones extends Model
{
    use SoftDeletes;

    public $table = 'aviones';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'codigoid',
        'empresa_id',
        'modelo',
        'capacidad',
        'disponibilidad',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigoid' => 'string',
        'empresa_id' => 'integer',
        'modelo' => 'string',
        'capacidad' => 'integer',
        'disponibilidad' => 'integer',
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
