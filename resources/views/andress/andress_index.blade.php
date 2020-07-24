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
        <div class="col-sm-4 col-3"></div>
        <div class="col-sm-8 col-9 text-right mb-2 px-3">
            <a href="{{ url('endereco/novo', []) }}" class="btn btn-primary btn-rounded" style="font-weight: bold"><i class="icon-plus" style="font-size: 15px"></i>  Novo</a>
        </div>
    </div>

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container">
                <div class="t-header">Lista de Endereços</div>
                    <div class="table-responsive">
                        <table id="basicExample" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>*</th>
                                    <th>Empresa</th>
                                    <th>Endereço</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($andresses as $andress)
                                    <tr>
                                        <td>{{ $andress->id }}</td>
                                        <td>{{ $andress->company->name }}</td>
                                        <td>{{ $andress->andress.', '.$andress->number }}</td>
                                        <td>{{ $andress->neighborhood }}</td>
                                        <td>{{ $andress->city .'-'. $andress->uf }}</td>
                                        <td>
                                            <div class="td-actions" style="justify-content: flex-start">
                                                {{-- <a href="#" class="icon" style="color: #000; " data-toggle="tooltip" data-placement="top" title="" data-original-title="Visualizar">
                                                    <i class="icon-eye1" style="font-size: 1rem"></i>
                                                </a> --}}
                                                <a href="{{ url('endereco/editar/'.$andress->id, []) }}" class="icon" style="color: #000" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
                                                    <i class="icon-edit1" style="font-size: 1rem"></i>
                                                </a>
                                                <a href="#" class="icon" style="color: #000" data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir">
                                                    <i class="icon-trash-2" style="font-size: 1rem"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection