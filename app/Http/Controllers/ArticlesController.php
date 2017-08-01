<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;//modelo articulo
use App\Category;//modelo categoria
use App\Tag;//modelo Tag
use App\Image;//modelo Tag
use Laracasts\Flash\Flash;//mensajes flash

class ArticlesController extends Controller
{

    public function index(){

        return view('admin.articles.index');
    }

    public function create(){

      $categories = Category::orderBy('name', 'ASC')->pluck('name','id');
      //dd($categories);
      $tags = Tag::orderBy('name', 'ASC')->pluck('name','id');
      return view('admin.articles.create')
      ->with('categories', $categories)
      ->with('tags', $tags);
    }

    public function store(Request $request){

        //dd($request->tags);
        /*Manipulación de images*/
        if($request->file('image') ){

          $file = $request->file('image');
          $name = 'pokemon_' . time() . '.' . $file->getClientOriginalExtension();
          $path =  public_path() . '/images/articles/';
          $file->move($path, $name);
          //dd($path);
        }
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        //dd($article);
        $article->save();
//Llenando tabla PIVOTE ARTICLE_TAG
        $article->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);
        $image->save();

        Flash::success('Se ha creado el articulo ' . $article->title . ' correctamente!');
        return redirect()->route('articles.index');
    }
}
