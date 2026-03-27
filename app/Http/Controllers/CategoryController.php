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
}
