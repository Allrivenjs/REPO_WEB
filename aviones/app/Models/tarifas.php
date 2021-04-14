<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tarifas
 * @package App\Models
 * @version November 17, 2020, 2:31 am UTC
 *
 * @property string $titulo
 * @property integer $precio
 * @property string $descripcion
 */
class tarifas extends Model
{
    use SoftDeletes;

    public $table = 'tarifas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'titulo',
        'precio',
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
        'precio' => 'integer',
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
