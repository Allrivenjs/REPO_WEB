<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class empresas
 * @package App\Models
 * @version November 17, 2020, 2:27 am UTC
 *
 * @property string $companie
 * @property string $nit
 * @property string $correo
 * @property string $representante
 * @property string $telefono
 * @property string $direccion
 */
class empresas extends Model
{
    use SoftDeletes;

    public $table = 'empresas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'companie',
        'nit',
        'correo',
        'representante',
        'telefono',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'companie' => 'string',
        'nit' => 'string',
        'correo' => 'string',
        'representante' => 'string',
        'telefono' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
