<div class="slider">
    @foreach($slider as $sliderItem)
        <div class="slide {{ $loop->first ? 'current' : '' }}" style="background: url('storage/{{ $sliderItem->imagen }}') no-repeat center top/cover;" data-img-movil="background: url('storage/{{ $sliderItem->imagen_movil }}')">
            <div class="slide__info">
                <h2 class="slide__title">{{ $sliderItem->titulo }}</h2>

                <p class="slide__text">
                {{ $sliderItem->descripcion }}
                </p>
            </div>
        </div>
    @endforeach
</div>

<button id="prev" class="prev">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.1 1.4L16.6 0 4.7 12l11.9 12 1.5-1.4L7.5 12 18.1 1.4z"/></svg>
</button>

<button id="next" class="next">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.9 1.4L7.4 0l11.9 12L7.4 24l-1.5-1.4L16.5 12 5.9 1.4z"/></svg>
</button>