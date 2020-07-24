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
        <a href="{{ url('settings/role/new', []) }}" class="btn btn-primary btn-rounded" style="font-weight: bold"><i class="icon-plus" style="font-size: 15px"></i>  Novo</a>
    </div>
</div>

<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container">
            <div class="t-header">Lista de Funções</div>
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Função</th>
                                <th>Permissões associadas</th>
                                <th class="text-right">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge badge-pill badge-light">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="td-actions justify-content-center">

                                        <a href="{{ url('settings/role/edit/'.$role->id, []) }}" class="icon" style="color: #000" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
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
