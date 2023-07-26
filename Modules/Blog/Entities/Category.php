<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
    ];

     //-------------------------------------RELATIONS-------------------------------------//

     public function posts(){
        return $this->hasMany(Post::class);
     }

    
    //-------------------------------------METHODS-------------------------------------//

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\CategoryFactory::new();
    }
   
}
