<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $pages = ['Usuários'];
        $roles = Role::all();
        return view('settings.user.user_index', compact('pages','users','roles'));
    }

    public function active($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 1) {
            $user->status = 0;
        }else{
            $user->status = 1;
        }

        $user->save();

        return Redirect::back();
    }

    public function assignRole(Request $request)
    {
        $user = User::find($request->input('user_id'));

        $user->role_id = $request->input('role');

        $user->save();

        return Redirect::back()->with([
            'message' => "Função: Role::find($request->input('role')->name) atribuída ao usuário: <strong>$user->name<strong/>",
            'title' => 'Sucesso:',
            'alert-type' => 'success',

        ]);
    }
}
