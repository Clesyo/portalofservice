<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function index()
    {
        $pages = ['Serviços'];
        $services = Service::all();
        return view('service.service_index', compact('pages', 'services'));
    }
    //
    public function create()
    {
        $pages = ['Serviços','Novo'];
        return view('service.service_create', compact('pages'));
    }

    public function createWithCompany($company_id)
    {
        $pages = ['Serviços','Novo'];
        return view('service.service_create', compact('pages','company_id'));
    }

    public function store(Request $request)
    {

        $service = new Service();
        dd($request->all());
        $service = $service::create($request->all());

        if($service){

            $notification = array(
                'message' => 'Registro incluido com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Não foi possível incluir cadastro, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'error'
            );

        }

        return Redirect::back()->with('notification',$notification);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service = $service->update($request->all());

        if($service){

            $notification = array(
                'message' => 'Registro alterado com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Não foi possível alterar cadastro, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'error'
            );

        }

        return Redirect::back()->with('notification',$notification);

    }
}
