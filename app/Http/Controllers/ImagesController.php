<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller
{

  public function index(Request $request){

      $images =Image::all();
      $images->each(function($images){
        $images->article;
      });
      //dd($images);
      return view('admin.images.index')->with('images',$images);
  }


}
