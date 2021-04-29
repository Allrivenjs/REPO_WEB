<?php


namespace app\models;


use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 */
class Curriculum extends Model
{
    protected $table  = 'curriculum';
    protected $fillable =  ['id', 'nombre_c', 'carrera', 'foto', 'perfil_p', 'educacion',
        'año_e', 'correo', 'telefono', 'dirrecion', 'habilidades', 'exp_laboral'];
}