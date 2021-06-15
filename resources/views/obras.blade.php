@extends('layouts.template')

@section('title', 'Obras')

@section('content')
    <section id="header" class="header">
        <div id="slider" class="slider">
            @include('_partials.slider')
        </div>

        <div class="navigation">
            @include('_partials.navbar')
            @include('_partials.menu')
        </div>
    </section>

    <section id="services" class="services">
        @include('_partials.services')
    </section>

    <section id="history" class="history">
        @include('_partials.history')
    </section>

    <section id="partners" class="partners">
        @include('_partials.partners')
    </section>

    <section id="contact" class="contact">
        @include('_partials.contact')
    </section>

    <footer class="footer">
        @include('_partials.footer')
    </footer>
@endsection
