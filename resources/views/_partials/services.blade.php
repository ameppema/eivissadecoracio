@foreach($modules as $moduleItem)
    <div class="service__card">
        <a href="{{session()->get('locale').'/'. $moduleItem->enlace}}">
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