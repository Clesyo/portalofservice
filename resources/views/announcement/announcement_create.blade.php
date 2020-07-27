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

<div class="row gutters justify-content-center">

    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Informação básicas</div>
            </div>
            <div class="card-body">
                <form action="{{ url('url', []) }}" method="post" id="form-submit" enctype="multipart/form-data">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Selecione a empresa desejada</label>
                                <select class="form-control selectpicker" data-live-search="true" name="company_id" title="">
                                    @foreach ($companies as $company)
                                        @if ($company->user_id == Auth::user()->id)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Sobre a empresa:</label>
                                <textarea name="note" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Selecione as imagens para seu anuncio:</label>
                                <input type="file" class="form-control" name="images[]">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection