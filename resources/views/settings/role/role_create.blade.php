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
            <form action="{{ url('settings/role/new', []) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Informação básicas</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="name">Nome da Função: </label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                        </div>

                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="name">Funções Associadas: </label>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            @foreach ($permissions as $permission)
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="{{ $permission->id }}" name="permission_id[]" class="custom-control-input" id="permission{{ $permission->id }}">
                                        <label class="custom-control-label" for="permission{{ $permission->id }}">{{ $permission->label }}</label>
                                    </div>
                                </div>
                            @endforeach

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
