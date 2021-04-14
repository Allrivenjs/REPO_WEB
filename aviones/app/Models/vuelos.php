<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class vuelos
 * @package App\Models
 * @version November 17, 2020, 2:44 am UTC
 *
 * @property string $origen
 * @property string $destino
 * @property string $fecha
 */
class vuelos extends Model
{
    use SoftDeletes;

    public $table = 'vuelos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'origen',
        'destino',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'origen' => 'string',
        'destino' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
