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
        <button data-toggle="modal" data-target="#addCategory" class="btn btn-primary btn-rounded" style="font-weight: bold"><i class="icon-plus" style="font-size: 15px"></i>  Novo</button>
    </div>
</div>

<!-- Modal begin -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="basicModalLabel">Nova categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('category/store', []) }}" method="post" id="form-category">
                    @csrf
                    <div class="form-group">
                        <label for="category" class="col-form-label">Descrição da categoria:</label>
                        <input type="text" name="description"  class="form-control" id="category">
                    </div>
                </form>
            </div>
            <div class="modal-footer custom">
                <div class="left-side">
                    <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancelar</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                    <button type="button" class="btn btn-link success" onclick="document.getElementById('form-category').submit()">Gravar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container">
            <div class="t-header">Lista de Categorias</div>
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Função</th>
                                <th>Status</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge badge-pill badge-light">{{ __('Ativo') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-light">{{ __('Inativo') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="td-actions justify-content-center">

                                            <a href="{{ url('#', []) }}" class="icon" style="color: #000" data-rr="tooltip" data-toggle="modal" data-target="#alterCategory{{$category->id}}" data-placement="top" title="" data-original-title="Editar">
                                                <i class="icon-edit1" style="font-size: 1rem"></i>
                                            </a>

                                            <!-- Modal begin -->
                                                <div class="modal fade" id="alterCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="basicModalLabel">Alterar categoria</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('category/update/', []) }}" method="post" id="form-category{{$category->id}}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="form-group">
                                                                        <label for="category" class="col-form-label">Descrição da categoria:</label>
                                                                        <input type="text" name="description" value="{{ $category->description }}" class="form-control" id="category">
                                                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer custom">
                                                                <div class="left-side">
                                                                    <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancelar</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="right-side">
                                                                    <button type="button" class="btn btn-link success" onclick="document.getElementById('form-category{{$category->id}}').submit()">Gravar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal end -->

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
<script>
    $(document).ready(function() {
        $('[data-rr=tooltip]').tooltip();
    });
</script>
@endsection