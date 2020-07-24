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
        <button href="{{ url('settings/module/new', []) }}" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#modalNewPermission" style="font-weight: bold"><i class="icon-plus" style="font-size: 15px"></i>  Novo</button>


        <!-- Modal start -->
        <div class="modal fade" id="modalNewPermission" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ url('settings/permission/store', []) }}" method="post">
                        @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Nova Permissão</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row gutters">

                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                    <div class="form-group">
                                        <label for="label-name" class="col-form-label">Descrição da Permissão:</label>
                                        <input type="text" name="label" class="form-control" id="label-name">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="descript-name" class="col-form-label">Nome da Permissão:</label>
                                        <input type="text" name="name" class="form-control" id="descript-name">
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="">Módulo:</label>
                                        <select class="form-control selectpicker" data-live-search="true" data-show-subtext="true" name="module_id">
                                            <option value="">-- Select --</option>
                                            @foreach ($modules as $module)
                                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row gutters">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="">Tipo:</label>
                                        <select class="form-control selectpicker" data-live-search="true" data-show-subtext="true" name="type">
                                            <option value="">-- Select --</option>
                                            @foreach ($types as $key => $type)
                                                <option value="{{ $key }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Grava</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal end-->

    </div>
</div>

<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container">
            <div class="t-header">Lista de Permissões</div>
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Nome</th>
                                <th>Módulo</th>
                                <th>Modalidade</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)

                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->label }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->module->name }}</td>
                                <td>
                                    @switch($permission->type)
                                        @case('R')
                                            {{ __('Read') }}
                                            @break
                                        @case('W')
                                            {{ __('Write') }}
                                            @break
                                        @case('C')
                                            {{ __('Create') }}
                                            @break
                                        @case('D')
                                            {{ __('Delete') }}
                                            @break
                                        @case('E')
                                            {{ __('Export') }}
                                            @break
                                        @case('I')
                                            {{ __('Import') }}
                                            @break
                                        @default

                                    @endswitch
                                </td>
                                <td>
                                    <div class="td-actions justify-content-center">

                                        <a href="{{ url('', []) }}" class="icon" style="color: #000" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
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
