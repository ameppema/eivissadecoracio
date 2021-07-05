<div class="slider">

    @foreach($slider as $sliderItem)
        <div class="slide {{ $loop->first ? 'current' : '' }}" style="background: url('storage/{{ $sliderItem->imagen }}') no-repeat center top/cover;">
            <div class="slide__info">
                <h2 class="slide__title">{{ $sliderItem->titulo }}</h2>

                <p class="slide__text">
                {{ $sliderItem->descripcion }}
                </p>
            </div>
        </div>
    @endforeach

</div>