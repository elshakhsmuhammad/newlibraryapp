<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use CommentableTrait, LikableTrait;

    protected $fillable=['body','user_id'];
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  //  public function likes()
  //  {
       // return $this->hasMany(Like::class);
  //  }
}
