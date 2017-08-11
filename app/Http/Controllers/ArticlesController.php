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

    public function index(Request $request){

        $articles = Article::search($request->title)->orderBy('id','ASC')->paginate(5);
        $articles->each(function($articles){
          $articles->category;
          $articles->user;
        });
        //dd($articles);
        return view('admin.articles.index')->with('articles',$articles);
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

        $this->validate($request, [
            'title' => 'min:2|max:250|required|unique:articles',
            'category_id' => 'required',
            'content' => 'min:10|required',
            'image' => 'image|required'
        ]);
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

    public function update(Request $request, $id){

      $article = Article::find($id);
      $article->fill($request->all());
      $article->save();
      //actualizando tabla pivote
        $article->tags()->sync($request->tags);
      flash('El articulo ' . $article->title . ' ha sido guardado correctamente')->warning()->important();
      return redirect()->route('articles.index');
    }

    public function edit($id){

        $article = Article::find($id);
        $article->category;
        //dd($article->category->id);
        $categories = Category::orderBy('name', 'ASC')->pluck('name','id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name','id');
        $my_tags = $article->tags->pluck('id')->toArray();
        //dd($article->tags->pluck('id')->toArray());

        return view('admin.articles.edit')
        ->with('categories',$categories)
        ->with('article', $article)
        ->with('tags',$tags)
        ->with('my_tags', $my_tags);

    }

    public function destroy($id){

      $article = Article::find($id);
      //dd($article->id);
      $article->delete();

      flash('El artículo ' . $article->title .  ' ha sido borrado correctamente')->warning()->important();
    	return redirect()->route('articles.index');
    }
}
