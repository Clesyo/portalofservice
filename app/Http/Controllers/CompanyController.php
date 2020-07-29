<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Andress;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $pages = ['Empresa'];
        $companies = Company::all();
        return view('company.company_index', compact('pages','companies'));
    }

    function create()
    {
        $pages = ['Empresa','Novo'];
        $categories = Category::all();
        return view('company.company_create', compact('pages', 'categories'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $pages = ['Empresa','Editar'];
        return view('company.company_edit', compact('pages','company'));
    }

    public function store(Request $request)
    {
        $company = new Company();
        $dados = $request->all();
        $image = $request->file('image');
        dd($image);
        unset($dados['image']);
        dd($dados);

        $company = $company::create($request->all());

        if($company){

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

        return Redirect::to('empresa')->with($notification);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company = $company->update($request->all());

        if($company){

            $notification = array(
                'message' => 'Registro alterado com sucesso.',
                'title' => 'Sucesso:',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Não foi possível altarar cadastro, tente novamente.',
                'title' => 'Erro:',
                'alert-type' => 'error'
            );
        }

        return Redirect::redirect('empresa')->with('notification',$notification);
    }
}
