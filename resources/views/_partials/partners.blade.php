<div class="partners__info">
    <h3 class="partners__title">{{$partnersData->titulo}}</h3>

    <p class="partners__text">
    {{$partnersData->subtitulo}}
    </p>
</div>

<div class="partners__brands">
     @foreach($galleryPartners as $partnerImage)
        <img src="storage/{{ $partnerImage->image_src }}" alt="{{ $partnerImage->image_alt }}">
    @endforeach
</div>
