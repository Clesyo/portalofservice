@extends('layouts.main')

@section('content')
     <!--Page header start -->
     <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
                @for ($i = 0; $i < (count($pages) -1); $i++)
                    @if(count($pages) >= 2)
                        <li class="breadcrumb-item">{{$pages[$i]}}</li>
                    @endif
                @endfor
                        <li class="breadcrumb-item active">{{end($pages)}}</li>
            
            {{-- <li class="breadcrumb-item active">Admin Dashboard</li> --}}
        </ol>
        <ul class="app-actions">
            <li>
                <a href="#" id="reportrange">
                    <span class="range-text">Apr 25, 2020</span>
                    <i class="icon-chevron-down"></i>	
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-export"></i>
                </a>
            </li>
        </ul>
    </div>
    <!--Page header end -->

    <div class="row gutters">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="{{ url('empresa/update/'.$company->id, []) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Informações básicas</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                <div class="form-group">
                                    <label for="name">Nome Completo</label>
                                    <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="cpf_cnpj">CPF/CNPJ</label>
                                    <input type="text" class="form-control" name="cpf_cnpj" value="{{ $company->cpf_cnpj }}">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $company->email }}">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="tel" class="form-control" name="telephone" value="{{ $company->telephone }}">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label for="">Whatsapp</label>
                                    <input type="tel" class="form-control" name="whatsapp" value="{{ $company->whatsapp }}">
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
                                <div class="form-group">
                                    <div class="mb-4"></div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input"  name="status" value="1" id="customSwitch1" checked>
                                        <label class="custom-control-label" for="customSwitch1">Ativo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

  
@endsection