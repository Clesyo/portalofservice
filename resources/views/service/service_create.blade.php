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
            <form action="{{ url('servico/store', []) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Informação básicas</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                <div class="form-group">
                                    <label for="name">Descrição do Serviço</label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                            </div>
                            
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                <div class="form-group">
                                    <label for="">Empresa</label>
                                    <select class="form-control selectpicker" data-live-search="true" data-show-subtext="true" name="company_id">
                                        @foreach (\App\Models\Company::where('user_id',Auth::user()->id)->get() as $company)
                                            
                                            <option value="{{ $company->id }}" 
                                                @isset($company_id)
                                                    @if ($company->id == $company_id)
                                                        selected
                                                    @endif
                                                @endisset
                                                >{{ $company->name }}</option>
                                        @endforeach
                                    </select>
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
                    <div class="card-footer text-right ">
                        <button class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection