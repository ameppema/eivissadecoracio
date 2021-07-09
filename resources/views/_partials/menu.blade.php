<ul class="menu-mobile">
    <li class="language">
        <a class="spanish active" href="/">
            <img src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Language">
            <p>ES</p>
        </a>

        <a class="english" href="/">
            <img src="/images/navbar/lang_en.png" alt="Eivissa Decoracio Language">
            <p>EN</p>
        </a>
    </li>

    <li class="menu__item {{ (request()->is('/')) ? 'selected' : '' }}">
        <a href="/">
            Home
        </a>
    </li>

    <li class="menu__item {{ (request()->is('historia')) ? 'selected' : '' }}">
        <a href="/historia">
            Historia
        </a>
    </li>

    <li class="menu__item {{ (request()->is('obras')) ? 'selected' : '' }}">
        <a href="/obras">
            Obras
        </a>
    </li>

</ul>

<!-- Inicia Menu de Escritorio -->

<ul class="menu-desktop">
    <li class="menu__item {{ (request()->is('/')) ? 'selected' : '' }}">
        <a href="/">
            Home
        </a>
    </li>

    <li class="menu__item {{ (request()->is('historia')) ? 'selected' : '' }}">
        <a href="/historia">
            Historia
        </a>
    </li>

    @foreach($menus as $menuItem)
    <li class="menu__item {{ (request()->is('obras')) ? 'selected' : '' }}">
        <a href="{{$menuItem->ruta}}">
            {{$menuItem->nombre}}
        </a>
    </li>
    @endforeach

    <li class="language">
        <a class="spanish active" href="/">
            <img src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Language">
            <p>ES</p>
        </a>

        <a class="english inactive" href="/">
            <img src="/images/navbar/lang_en.png" alt="Eivissa Decoracio Language">
            <p>EN</p>
        </a>
    </li>
</ul>
