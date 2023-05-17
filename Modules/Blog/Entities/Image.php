<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    //-------------------------------------RELATIONS-------------------------------------//

    /**
     * Relacion polimorfica
     * Image - Post
     */
    public function imageable()
    {
        return $this->morphTo();
    }


    //-------------------------------------METHODS-------------------------------------//

     protected static function newFactory()
     {
         return \Modules\Blog\Database\factories\ImageFactory::new();
     }
}
