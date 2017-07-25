<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    
    public function index(){
    
    	$categories= Category::orderBy('id','ASC')->paginate(5);
    	return view('admin.categories.index')->with('categories',$categories);
    
    }

    public function create(){

    	return view('admin.categories.create');	
    }

    public function store(Request $request){
    	
    	$this->validate($request, [
            'name' => 'bail|required|min:1|max:120|unique:categories'
        ]);
    	$category = new Category($request->all());
    	//dd($category);
    	$category->save();
    	flash("Se ha registrado " . $category->name)->success()->important();
    	return redirect()->route('categories.index');
    }

    public function destroy($id){
    	
    	$category = Category::find($id);
    	//dd($category);
    	$category->delete();
    	flash('La categoría ' . $category->name . ' ha sido borrada correctamente')->warning()->important();
    	return redirect()->route('categories.index');
    }

    public function edit($id){
     	
     	$category =  Category::find($id);
     	return view('admin.categories.edit')->with('category',$category);
    }

    public function update(Request $request, $id){
     	//dd($request->all());   
     	$category = Category::find($id);
     	$category->name = $request->name;
     	$category->save();
     	flash('La categoria ' . $category->name . ' ha sido guardada correctamente')->warning()->important();
        return redirect()->route('categories.index');
    }

}
