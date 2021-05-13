<?php


namespace app\models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail($id)
 */
class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';
}