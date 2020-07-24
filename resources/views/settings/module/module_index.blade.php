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
        <button href="{{ url('settings/module/new', []) }}" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#modalNewModule" style="font-weight: bold"><i class="icon-plus" style="font-size: 15px"></i>  Novo</button>

        <!-- Modal start -->
        <div class="modal fade" id="modalNewModule" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ url('settings/module/store', []) }}" method="post">
                        @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="basicModalLabel">Novo Módulo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row gutters">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="module-name" class="col-form-label">Descrição do Módulo:</label>
                                        <input type="text" name="name" class="form-control" id="module-name">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <label for="module-name" class="col-form-label">Descrição do Módulo:</label>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="pay" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="customRadioInline1">Grátis</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="pay" class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="customRadioInline2">Pago</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12">
                                    <div class="form-group">
                                        <div class="mt-4"></div>
                                        <div class="custom-control custom-switch ">
                                            <input type="checkbox" class="custom-control-input" name="status" value="1" id="customSwitch1" checked>
                                            <label class="custom-control-label" for="customSwitch1">Ativo</label>
                                        </div>
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
            <div class="t-header">Módulos do Sistema</div>
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Modalidade</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $module)

                            <tr>
                                <td>{{ $module->id }}</td>
                                <td>{{ $module->name }}</td>
                                <td> @if($module->pay == 0) {{ __('Grátis') }} @endif</td>
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
