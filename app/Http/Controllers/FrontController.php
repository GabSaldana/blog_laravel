<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class FrontController extends Controller
{
    public function index(){

      $articles = Article::orderBy('id', 'desc')->paginate(4);
      $articles->each(function($articles){
        $articles->category;
        $articles->images;//relacion del modelo
      });
      //dd($articles);
      return view('front.index')->with('articles',$articles);
    }
}
