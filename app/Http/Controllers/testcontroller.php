<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class testcontroller extends Controller
{
    public function view($id){

    	$article = Article::find($id);
    	
    	//metodos establecidos en el modelo
    	$article->category;
    	$article->user;
    	$article->images;
    	$article->tags;
    	//dd($article);

    	//para mandar los datos del controlador hacia una vista
    	return view('test.index',['article' => $article]);
    }
}
