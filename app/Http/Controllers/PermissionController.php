<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $pages = ['Configuração', 'Permissões'];
        $types = [
            'R' => 'Read',
            'W' => 'Write',
            'C' => 'Create',
            'D' => 'Delete',
            'E' => 'Export',
            'I' => 'Import',
        ];
        $modules = Module::all();
        $permissions = Permission::all();
        return view('settings.permission.permission_index', compact('pages','types','permissions','modules'));
    }
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission = $permission::create($request->all());

        if ($permission) {
            $notificaiton = array(
                'message' => 'Permissão incluido com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            );
        } else {
            $notificaiton = array(
                'message' => 'Não foi possível incluir cadastro, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'error'
            );
        }


        return Redirect::back()->with('message',$notificaiton);
    }
}
