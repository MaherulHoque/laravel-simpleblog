<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = ['category_name', 'slug', 'description'];

    protected $hidden = ['remember_token'];

    public function post()
    {
    	return $this->hasMany('App\Post');
    }

}
