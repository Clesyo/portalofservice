<?php

namespace App\Http\Controllers;

use App\Models\Andress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AndressController extends Controller
{
    //
    public function index()
    {
        $pages = ['Endereços'];
        $andresses = Andress::all();
        return view('andress.andress_index', compact('pages', 'andresses'));
    }

    public function create()
    {
        $pages = ['Endereços','Novo'];
        $states = [
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RA'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins',
        ];
        return view('andress.andress_create', compact('pages','states'));
    }
    public function createWithCompany($company_id)
    {
        $pages = ['Endereços','Novo'];
        $states = [
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RA'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins',
        ];
        return view('andress.andress_create', compact('pages','states','company_id'));
    }

    public function store(Request $request)
    {
        $andress = new Andress();
        $andress = $andress::create($request->all());

        if($andress){

            $notification = array(
                'message' => 'Endereço incluido com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Não foi possível incluir endereço, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'erroe'
            );
        }

        return Redirect::to('company')->with('notification',$notification);

    }

    public function edit($id)
    {
        $andress = Andress::findOrFail($id);
        $pages = ['Endereços','Editar'];
        $states = [
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RA'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins',
        ];
        return view('andress.andress_edit', compact('andress','pages', 'states'));
    }

    public function update(Request $request, $id)
    {
        $andress = Andress::findOrFail($id);

        $andress = $andress->update($request->all());
        if($andress){

            $notification = array(
                'message' => 'Endereço incluido com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Não foi possível incluir endereço, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'erroe'
            );
        }

        return Redirect::to('company')->with('notification',$notification);
    }
}
