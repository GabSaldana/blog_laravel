<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;//modelo tag
use Laracasts\Flash\Flash;//mensajes flash

class TagsController extends Controller
{

    public function index(Request $request){

    	//dd('metodo default');
    	//paginacion es una tecnica para mostrar grandes contenidos de infrmación sin
    	//perder las dimesiones de la pagina web.
    	$tags= Tag::search($request->name)->orderBy('id','ASC')->paginate(5);
    	return view('admin.tags.index')->with('tags',$tags);;
    }

    public function create(){

    	//dd('Hola esto es un mensaje de el controlador de usuarios, funcion crear');
    	//vista para crear un usuario

    	return view('admin.tags.create');
    }

    public function store(Request $request){

      $this->validate($request, [
            'name' => 'bail|required|unique:tags|min:4|max:120',
        ]);
      $tag = new Tag($request->all());
      $tag->save();
      flash("Se ha registrado " . $tag->name)->success()->important();
    	return redirect()->route('tags.index');

    }

    public function destroy($id){

      $tag = Tag::find($id);
      $tag->delete();
    	flash('El tag ' . $tag->name .  ' ha sido borrado correctamente')->warning()->important();
    	return redirect()->route('tags.index');
    }

    public function edit($id){
      $tag =  Tag::find($id);
      return view('admin.tags.edit')->with('tag',$tag);
    }

    public function update(Request $request, $id){

      $tag = Tag::find($id);
      $tag->name = $request->name;
      $tag->save();
      flash('El tag ' . $tag->name . ' ha sido guardado correctamente')->warning()->important();
      return redirect()->route('tags.index');
    }
}
