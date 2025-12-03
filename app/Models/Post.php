<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Post extends Model
{
   use HasFactory;
   protected $fillable = ['title', 'text', 'category_id', 'user_id']; //
   
   //el post pertene a un usuario
   public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
   


   //el poste pertence a una categoria
    public function category(): BelongsTo
    {
      return $this->belongsTo(Category::class);

   }

      

  // Un post puede tener muchos comentarios

  public function comments(): HasMany
  {
    return $this->hasMany(Comment::class);
  }

  //un post puede tener muchas etiquetas

  public function tags(): BelongsToMany{

    return $this->belongsToMany(Tag::class);
  }

   
}
