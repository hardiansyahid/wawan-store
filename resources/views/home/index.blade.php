@extends('layout.landing.baseLanding')
@section('title', 'Wawan Store')
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/img/store (1).jpeg')}}" class="d-block w-100" height="420" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/img/store (2).jpeg')}}" class="d-block w-100" height="420" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/img/store (3).jpeg')}}" class="d-block w-100" height="420" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="mt-5"></div>
    <h1 class="text-center">Wawan Store</h1>
    <h6 class="text-center">Lengkapi kebutuhan pokok anda</h6>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card py-5 mx-2 my-2 col-md-2">
                <div class="card-body text-center">
                    <h1>Beras</h1>
                </div>
            </div>
            <div class="card py-5 mx-2 my-2 col-md-2">
                <div class="card-body text-center">
                    <h1>Minyak</h1>
                </div>
            </div>
            <div class="card py-5 mx-2 my-2 col-md-2">
                <div class="card-body text-center">
                    <h1>Gula</h1>
                </div>
            </div>
            <div class="card py-5 mx-2 my-2 col-md-2">
                <div class="card-body text-center">
                    <h1>Dan Lainnya</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-5"></div>
    <h1 class="text-center">Berbelanja di toko kami</h1>
    <h6 class="text-center">Dapatkan kebutuhan pokok anda, dengan harga yang bersaing</h6>


    <div class="mt-5"></div>
    <h1 class="text-center">Lokasi</h1>

    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe src="https://maps.google.com/maps?q=Pasar%20Gading%20Rejo%20Kab.%20Pringsewu&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=&amp;output=embed" id="gmap_canvas" frameborder="0" scrolling="no" style="width: 100%; height: 420px;">
            </iframe>
            <style>
                .mapouter{position:relative;text-align:right;height:420px;width:100%;}</style><style>.gmap_canvas{overflow:hidden;background:none!important;height:420px;width:100%;}
            </style>
            <a href="https://www.eireportingonline.com">ei reporting online</a>
        </div>
    </div>

    @include('layout.footer')
@endsection
