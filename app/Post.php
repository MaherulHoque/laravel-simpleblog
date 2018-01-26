<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_category_id', 'title', 'image', 'description', 'user_id'];

    protected $hidden = ['remember_token'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function post_category()
    {
    	return $this->belongsTo('App\PostCategory');
    }


}
