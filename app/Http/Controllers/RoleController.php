<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    //
    public function index()
    {
        $pages = ['Configuração', 'Funções'];
        $roles = Role::all();
        return view('settings.role.role_index', compact('pages','roles'));
    }

    public function create()
    {
        $pages = ['Configuração', 'Funções', 'Novo'];
        $permissions = Permission::all();
        return view('settings.role.role_create', compact('pages','permissions'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $permission_id = $request->input('permission_id');
        $dados['name'] = $request->input('name');

        $role = $role::create($dados);

        if($role){
            $role->permissions()->attach($permission_id);
            $notification = [
                'message' => 'Função incluida com sucesso.',
                'title' => 'Cadastro:',
                'alert-type' => 'success',
            ];
        }else{
            $notification = [
                'message' => 'Erro ao cadastrar função, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'error',
            ];
        }

        return Redirect::to('settings/role')->with($notification);
    }

    public function edit($id)
    {
        $pages = ['Configuração', 'Funções', 'Editar'];
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('settings.role.role_edit', compact('pages','role','permissions'));
    }
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permission_id = $request->input('permission_id');
        $dados['name'] = $request->input('name');
        $role = $role->update($dados);

        if($role){
            $role = Role::findOrFail($id);

            //$role->permissions()->detach();
            $role->permissions()->sync($permission_id);

            $notification = [
                'message' => 'Função alterada com sucesso.',
                'title' => 'Alteração:',
                'alert-type' => 'success',
            ];
        }else{
            $notification = [
                'message' => 'Erro ao alterar função, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'error',
            ];
        }

        return Redirect::to('settings/role')->with('notification',$notification);
    }
}
