<?php


namespace app\models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 */
class BlogPost extends Model
{
        protected $table  = 'blog_posts';
        protected $fillable =  ['id','title', 'content', 'img_url', 'creador','created_at'];
        //public $timestamps = false;


}