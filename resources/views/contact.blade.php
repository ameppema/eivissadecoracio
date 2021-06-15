@extends('layouts.template')

@section('title', 'Contact')

@section('content')
    <nav class="navigation">
        @include('_partials.navbar')
        @include('_partials.menu')
    </nav>

    <section id="contact" class="contact">
        @include('_partials.contact')
    </section>
@endsection
