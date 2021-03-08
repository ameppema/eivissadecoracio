@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <section id="slider" class="slider">
        @include('_partials.slider2')
    </section>

    {{-- <nav class="navbar">
        @include('_partials.navbar')
    </nav> --}}

    {{-- <section id="about" class="about">
        @include('_partials.about')
    </section> --}}

    {{-- <section id="tour" class="tour">
        @include('_partials.tour')
    </section> --}}

    {{-- <section id="news" class="news">
        @include('_partials.news')
    </section> --}}

    {{-- <section id="music" class="music">
        @include('_partials.music')
    </section> --}}

    {{-- <section id="contact" class="contact">
        @include('_partials.contact')
    </section> --}}

    {{-- <footer class="footer">
        @include('_partials.footer')
    </footer> --}}
@endsection
