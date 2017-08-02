<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{

    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    //NOTA: Recuerden que 'slug' es el campo en la tabla y 'title' es el origen del campo
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = "articles";

    protected $fillable = ["title", "content", "user_id", "category_id"];

    public function category(){
    	//Un articulo solo tiene una categoria
    	return $this->belongsTo('App\Category');
    }

    public function user(){

    	return $this->belongsTo('App\User');
    }

    public function images(){
    	return $this->hasMany('App\Image');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function scopeSearch($query, $title){

        return $query->where('title','like','%'.$title.'%');
    }
}
