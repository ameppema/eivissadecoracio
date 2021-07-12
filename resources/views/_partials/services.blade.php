@foreach($modules as $moduleItem)
<div class="service__card">
    <a href="{{$moduleItem->enlace}}">
        <img class="service__image" src="storage/{{$moduleItem->imagen_principal}}" alt="Nuestros Servicios">

        <div class="service__info">
            <h3 class="service__title">{{$moduleItem->titulo}}</h3>

            <p class="service__text">
            {{$moduleItem->subtitulo}}
            </p>

            <button class="service__button">Click</button>
        </div>
    </a>
</div>
@endforeach()

<div class="service__card">
    <a href="/">
        <img class="service__image" src="/images/services/service_06.jpg" alt="">
        <div class="service__info">
            <h3 class="service__title">Más servicios.</h3>

            <p class="service__text">
                Duis a ipsum venenatis quis ullamcorper elit.
            </p>

            <button class="service__button">Click</button>
        </div>
    </a>
</div>