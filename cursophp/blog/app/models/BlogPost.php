<?php


namespace app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $id)
 * @method static findOrFail($id)
 */
class BlogPost extends Model
{
        use SoftDeletes;
        protected $table  = 'blog_posts';
        protected $fillable =  ['id','title', 'content', 'img_url', 'creador','created_at'];
        //public $timestamps = false;


}