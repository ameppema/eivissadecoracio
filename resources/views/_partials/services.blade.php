@foreach($modules as $moduleItem)
    <div class="service__card">
        <a href="{{$moduleItem->enlace}}">
            <img class="service__image" src="storage/{{$moduleItem->imagen_principal}}" alt="{{$moduleItem->titulo}}">

            <div class="service__info">
                <h3 class="service__title">{{$moduleItem->titulo}}</h3>

                <p class="service__text">
                {{$moduleItem->subtitulo}}
                </p>

                <button class="service__button">Click</button>
            </div>
        </a>
    </div>
@endforeach

<div class="service__card">
    <a href="/">
        <img class="service__image" src="/storage/services/services_lg.jpg" alt="Más servicios">
        <div class="service__info">
            <h3 class="service__title">Más servicios.</h3>

            <p class="service__text">
                Duis a ipsum venenatis quis ullamcorper elit.
            </p>

            <button class="service__button">Click</button>
        </div>
    </a>
</div>