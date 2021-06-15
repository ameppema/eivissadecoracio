@extends('layouts.template')

@section('title', 'Cocinas')

@section('content')
    {{-- <section id="slider" class="slider">
        @include('_partials.slider_mobile')
    </section> --}}

    <nav class="navigation">
        @include('_partials.navbar')
        @include('_partials.menu')
    </nav>
@endsection
