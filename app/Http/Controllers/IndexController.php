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
        ],
        [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.string' => 'El nombre del producto debe de ser texto.',
            'name.max' => 'El número de caracteres permitido es de 255.',
            'price.required' => 'El precio del producto es requerido',
            'price.numeric' => 'El precio debe de ser una cantidad numerica',
            'price.min' => 'El precio minimo es de $100 pesos',
            'stock.required' => 'El stock del producto es requerido',
            'stock.numeric' => 'El stock debe de ser una cantidad numerica',
            'stock.min' => 'El stock minimo debe de ser 1'
        ]);

        $producto = new Product();
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect()->route('index')->with('success', '¡Producto guardado correctamente!');
    }
}

