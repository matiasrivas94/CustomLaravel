<?php

namespace Modules\Blog\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Tag;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'extract',
        'body',
        'state',
        'user_id',
        'category_id',
    ];

    //-------------------------------------RELATIONS-------------------------------------//

    /**
     * Obtiene la categoria
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Obtiene el tag
     * Relacion de muchos a muchos
     * Tags - Post
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Obtiene el usuario que realizo la ultima accion
     */
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relacion polimorfica - uno a uno
     * Image - Post
     */
    public function image()
    {
        return $this->morphTo(Image::class,'imageable');
    }

    
    //-------------------------------------METHODS-------------------------------------//

     protected static function newFactory()
     {
         return \Modules\Blog\Database\factories\PostFactory::new();
     }

}
