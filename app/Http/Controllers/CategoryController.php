<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $pages = ['Categorias'];
        $categories = Category::all();
        return view('category.category_index', compact('pages','categories'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $notification = null;
        $category = $category::create($request->all());

        if($category){
            $notification = [
                'message' => 'Nova categoria inserida.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            ];
        }else{
                $notification = [
                    'message' => 'Erro ao incluir nova categoria, tente novamente.',
                    'title' => 'Erro:',
                    'alert-type' => 'error'
                ];
        }

        return Redirect::back()->with($notification);
    }

    public function update(Request $request)
    {
        $category = Category::findOrFail($request->input('id'));

        $category->description = $request->input('description');
        $category->save();

        return Redirect::back()->with([
            'message' => 'Categoria alterada com sucesso.',
            'title' => 'Sucesso:',
            'alert-type' => 'success'
        ]);
    }
}
