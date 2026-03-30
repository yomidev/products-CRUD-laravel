<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index(){
        $title = "Productos";
        $products = Product::all(); //Select * from products
        //dd($products);
        return view('welcome',compact('products', 'title'));
    }
    public function prueba($id){
        $message = $id;
        $title = "Pagina de prueba";
        return view('prueba', compact('message', 'title'));
    }

    public function details($id){
        $product = Product::where('id',$id)->first();
        $title = $product->name;
        return view('detalles', compact('product', 'title'));
    }
    public function create (){
        $title='agregar producto';
        return view('products.create',compact('title'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:100',
            'stock' => 'required|numeric|min:1'
        ]);

        return back()->with('success', '¡Producto guardado correctamente!');
    }
}

