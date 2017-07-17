<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= "categories";//nombre de la tabla que va a modificar el modelo
    // campos permitidos para ser mostrados o traidos del json
    // son los atributos que se obtendran y que irán a la tabla
    protected $fillable = ["name"];

    public function articles(){
    	//Una categoría tiene muchos articulos
    	return $this->hasMany('App\Article');
    }
}
