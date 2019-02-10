<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomment extends Model
{
    protected $fillable = [
        'id',
        'comment_id',
        'name',

    ];




    public function comment()
    {
        return $this->belongsTo(Comment::class,'comment_id','id');
    }
}
