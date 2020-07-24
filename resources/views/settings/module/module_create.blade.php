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
    
@endsection