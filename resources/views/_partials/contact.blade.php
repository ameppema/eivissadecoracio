<img class="contact__image" src="/images/sections/contact.jpg" alt="">

<div class="contact__overlay"></div>

<div class="contact__info">
    <h3 class="contact__title">{{__('translations.contactTitle')}}</h3>

    <p class="contact__text">
    {{__('translations.contactDescription')}}
    </p>

    <form class="contact__form" action="{{route('contact.send')}}" method="POST">
        @csrf

        <div class="form__name">
            <input type="text" id="name" name="name" placeholder="{{__('translations.contactName')}}:">

            @error('name')
            {{$message}}
            @enderror
        </div>

        <div class="form__email">
            <input type="text" id="email" name="email" placeholder="{{__('translations.contactMail')}}:">

            @error('email')
                {{$message}}
            @enderror
        </div>

        <div class="form__phone">
            <input type="text" id="phone" name="phone" placeholder="{{__('translations.contactPhone')}}:">

            @error('phone')
                {{$message}}
            @enderror
        </div>

        <div class="form__message">
            <textarea id="message" name="message" placeholder="{{__('translations.contactMessage')}}:"></textarea>

            @error('message')
                {{$message}}
            @enderror
        </div>

        <div class="form__button">
            <button type="submit">{{__('translations.contactSubmit')}}</button>
        </div>
    </form>

    @if (session('form'))
        <script>
            alert("{{session('form')}}");
        </script>
    @endif
</div>
