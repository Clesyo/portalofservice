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
        <a href="{{ url('anuncio/novo', []) }}" class="btn btn-primary btn-rounded" style="font-weight: bold"><i class="icon-plus" style="font-size: 15px"></i>  Novo</a>
    </div>
</div>

<!-- Row start -->
<div class="row gutters">
    @foreach ($announcements as $announcement)
        
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleControls{{ $announcement->id}}" class="carousel slide m-0" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($announcement->images as $image)
                                
                                <div class="carousel-item active">
                                    <img src="{{ url('storage/'.$image->path, []) }}" class="rounded d-block w-100" alt="Carousel">
                                </div>
                            @endforeach
                            {{-- <div class="carousel-item">
                                <img src="img/img4.jpg" class="rounded d-block w-100" alt="Carousel">
                            </div>
                            <div class="carousel-item">
                                <img src="img/img6.jpg" class="rounded d-block w-100" alt="Carousel">
                            </div> --}}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls{{ $announcement->id}}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls{{ $announcement->id}}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection