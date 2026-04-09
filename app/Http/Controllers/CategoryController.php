<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $title = "Categorias";
        $category=Category::all();
        return view('category.index', compact('category', 'title'));
    }

    public function create (){
        $title = "Crear Categoria";
        return view('category.create', compact('title'));

    }
    public function store (Request $request){
        $request->validate([
            'name' => 'required|string|max:255'
        ],
        [
            'name.required'=>'nombre de la categoria es requerido',
            'name.string'=>'el nombre debe ser texto',
            'name.max'=>'el numero de caracteres permitido es 255'
        ]);

        $category = new Category();
        $category->Name = $request->name;
        $category->Description = $request->description;
        $category->save();

        return redirect()->route('category.index')->with('success','categoria guardada correctamente');
        
    }
    public function edit($id){
        $category=Category::findOrFail($id);
        $title = "Editar categoria";
        return view('category.edit',compact('category', 'title'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|string|max:255'
        ],
        [
            'name.required'=>'nombre de la categoria es requerido',
            'name.string'=>'el nombre debe ser texto',
            'name.max'=>'el numero de caracteres permitido es 255'
        ]);

        $category = Category::findOrFail($id);
        $category->Name = $request->name;
        $category->Description = $request->description;
        $category->save();

        return redirect()->route('category.index')->with('success','categoria actualizada');
        
    }
}
