<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class clientes
 * @package App\Models
 * @version November 17, 2020, 2:47 am UTC
 *
 * @property string $nombre
 * @property string $tipoId
 * @property string $identificacion
 * @property string $telefono
 * @property string $correo
 * @property string $direccion
 * @property integer $edad
 * @property string $sexo
 */
class clientes extends Model
{
    use SoftDeletes;

    public $table = 'clientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'tipoId',
        'identificacion',
        'telefono',
        'correo',
        'direccion',
        'edad',
        'sexo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipoId' => 'string',
        'identificacion' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'direccion' => 'string',
        'edad' => 'integer',
        'sexo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
