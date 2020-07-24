<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{
    //
    public function index()
    {
        $pages = ['Módulos'];
        $modules = Module::all();
        return view('settings.module.module_index', compact('pages','modules'));
    }

    public function create()
    {
        return view('settings.module.module_create');
    }

    public function store(Request $request)
    {
        $module = new Module();
        //dd($request->all());

        $module = $module::create($request->all());

        if($module){

            $notification = array(
                'message' => 'Módulo incluido com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Não foi possível incluir módulo, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'erroe'
            );
        }

        return Redirect::back()->with($notification);
    }
}
