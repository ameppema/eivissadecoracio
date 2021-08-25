<div class="slider">
    <div class="slide current" style="background: url('/storage/{{ $services[0]->imagen }}') no-repeat center top/cover;" data-img-movil="background: url('/storage/{{ $content->imagen_movil }}')">
        <div class="slide__info">
            <h2 class="slide__title">{{ $services[0]->titulo }}</h2>

            <p class="slide__text">
                {{ $services[0]->descripcion }}
            </p>
        </div>
    </div>
</div>