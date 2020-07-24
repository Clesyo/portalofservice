@extends('layouts.main')

@section('content')
<!--Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Home</li>
       {{--  @forelse ($pages as $page)
            <li class="breadcrumb-item">{{$page}}</li>
        @empty
            
        @endforelse 
        <li class="breadcrumb-item active">Admin Dashboard</li>--}}
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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
