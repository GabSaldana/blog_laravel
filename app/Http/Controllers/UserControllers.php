<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;


class UserControllers extends Controller
{
    
    public function index(){
    
    	//dd('metodo default');
    	//paginacion es una tecnica para mostrar grandes contenidos de infrmación sin
    	//perder las dimesiones de la pagina web.
    	$users= User::orderBy('id','ASC')->paginate(5);
    	return view('admin.users.index')->with('users',$users);
    }

    public function create(){

    	//dd('Hola esto es un mensaje de el controlador de usuarios, funcion crear');
    	//vista para crear un usuario
    	
    	return view('admin.users.create');
    }

    public function store(Request $request){
    	
    	$this->validate($request, [
            'name' => 'bail|required|min:4|max:120',
            'email' => 'required|unique:users|max:255',
        ]);
        //dd($request->all());
    	$user = new User($request->all());
    	//$user->password=bcrypt($request->password);
    	$user->password=$request->password;
    	$user->save();
    	//dd($user->all());
    	//dd('Llamando a store dentro del controlador');
    	flash("Se ha registrado " . $user->name)->success()->important();
    	return redirect()->route('users.index');
    }

    public function destroy($id){
    	//dd($id);
    	$user = User::find($id);
    	//dd($user);
    	$user->delete();

    	flash('El usuario ' . $user->name .  ' ha sido borrado correctamente')->warning()->important();
    	return redirect()->route('users.index');
    }

    public function edit($id){
        //dd($id);
        $user =  User::find($id);
        //dd($user);
        //pasando los datos del usuario a la vista
        return view('admin.users.edit')->with('user',$user);
    }

    public function update(Request $request, $id){
        /*Request es una clase que toma los datos de un formulario y se los pasa a un
        objeto que es la variable $request, se peuden personalizar y crear los propios request
        y se pueden validar*/
        //dd($request);
        //dd($request->all());
        //dd($id);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->type= $request->type;
        $user->save();
        flash('El usuario ' . $user->name . ' ha sido guardado correctamente')->warning()->important();
        return redirect()->route('users.index');
    }
}
