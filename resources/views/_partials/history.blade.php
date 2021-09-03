<img class="history__image" src="storage/{{$historyImages->imagen_principal}}" alt="">

<div class="history__info">
    <a class="history__link" href="{{session()->get('locale')}}/historia">
        <h3 class="history__title">{{__('translations.historyTitle')}}</h3>

        <p class="history__text">
        {{__('translations.historyDescription')}}
        </p>

        <button class="history__button">Click</button>
    </a>
</div>
