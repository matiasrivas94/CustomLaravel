<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'color'
    ];

    //-------------------------------------RELATIONS-------------------------------------//
    
    /**
     * Obtiene el post
     * Relacion de muchos a muchos
     * Tags - Post
     */
    public function post()
    {
        return $this->belongsToMany(Post::class);
    }


    //-------------------------------------METHODS-------------------------------------//

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\TagFactory::new();
    }
}
