@extends('frontpage.layouts.main')
@section('container')
{{-- Header --}}
@include('frontpage.layouts.header')
{{-- Showcase --}}
@include('frontpage.components.highlight')
{{-- Showcase --}}
{{-- Section --}}
<section class="py-5 mt-5 bg-light">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-black">
            <h1 class="display-4 fw-bolder">Special Items</h1>
            <p class="lead fw-normal text-black-50 mb-0">Produk terbaik dengan harga terbaik juga ygy</p>
        </div>
    </div>
</section>
{{-- Section --}}

<!-- Section-->
{{-- <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        </div>
    </div>
</section> --}}
{{-- Footer --}}
@include('frontpage.layouts.footer')
{{-- AOS --}}
<script>
    function playMusic(){
    var music = new Audio('/music/music-2.mp3');
    music.play();
    }
</script>


@endsection