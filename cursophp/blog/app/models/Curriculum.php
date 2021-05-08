<?php


namespace app\models;

use app\traits\HasDefaultImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $id)
 */

class Curriculum extends Model
{
    use HasDefaultImage;
    use SoftDeletes;

    protected $table  = 'curriculum';
    protected $fillable =  ['id', 'nombre_c', 'carrera', 'foto', 'perfil_p', 'educacion',
        'año_e', 'correo', 'telefono', 'dirrecion', 'habilidades', 'exp_laboral'];
}