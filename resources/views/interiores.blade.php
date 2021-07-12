@extends('layouts.pages')

@section('title', 'Interiores')

@section('content')
    <section id="header" class="header">

        
        <div class="head">
            <div class="head__image" style="background: url('storage/{{ $interiores->imagen_principal }}') no-repeat center top/cover;" data-img-movil="background: url('storage/{{ $interiores->imagen_movil }}')">
                <div class="slide__info">
                    <h2 class="slide__title">{{ $interiores->titulo }}</h2>
        
                    <p class="slide__text">
                    {{ $interiores->subtitulo }}
                    </p>
                </div>
            </div>
        </div>

        <div class="navigation">
            @include('_partials.navbar')
            @include('_partials.menu')
        </div>
    </section>

    <section id="text__body" class="text__body">
        <p>Desarrollamos obras y reformas integrales de pisos, casas, chalets, fincas, locales comerciales, para lo cual contamos con profesionales de amplia experiencia en diferentes tipos de proyectos de reformas.</p>
    </section>
    
    
    <section id="gallery" class="gallery">
        @foreach ($gallery as $item)
            <div class="gallery__image">
                <img src="storage/{{$item->imagen_principal}}" alt="Imagen Servicios">
            </div>
        @endforeach
    </section>

    <section id="text__body" class="text__body">
        <p>Realizamos los trabajos de manera coordinada, responsable y optimizando tiempo y dinero para producir un resultado de calidad; de esta forma generamos confianza y seguridad en nuestro trabajo.</p>
    </section>

    <section id="gallery" class="gallery">
        @foreach ($gallery as $item)
            <div class="gallery__image">
                <img src="storage/{{$item->imagen_principal}}" alt="Imagen Servicios">
            </div>
        @endforeach
    </section>

    <section id="text__body" class="text__body">
        <p>Somos especialistas en reformas integrales en Ibiza; en nuestra amplia trayectoria, hemos realizado multitud de trabajos y proyectos de reforma y renovación, estudiamos el proyecto con detalle, adaptándonos a las preferencias, presupuesto y necesidades de todos nuestros clientes, por lo cual nuestro trabajo está avalado por un gran número de clientes satisfechos.</p>
    </section>

    <section id="contact" class="contact">
        @include('_partials.contact')
    </section>
    
    <footer class="footer">
        @include('_partials.footer')
    </footer>
@endsection
