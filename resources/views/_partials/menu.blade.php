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

    <li class="menu__item {{ (request()->is('interiores')) ? 'selected' : '' }}">
        <a href="/interiores">
            Interiores
        </a>
    </li>

    <li class="menu__item {{ (request()->is('cocinas')) ? 'selected' : '' }}">
        <a href="/cocinas">
            Cocinas
        </a>
    </li>

    <li class="menu__item {{ (request()->is('rehabilitaciones')) ? 'selected' : '' }}">
        <a href="/rehabilitaciones">
            Rehabilitaciones
        </a>
    </li>

    <li class="menu__item {{ (request()->is('parquets')) ? 'selected' : '' }}">
        <a href="/parquets">
            Parquets
        </a>
    </li>
</ul>

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

    <li class="menu__item {{ (request()->is('obras')) ? 'selected' : '' }}">
        <a href="/obras">
            Obras
        </a>
    </li>

    <li class="menu__item {{ (request()->is('interiores')) ? 'selected' : '' }}">
        <a href="/interiores">
            Interiores
        </a>
    </li>

    <li class="menu__item {{ (request()->is('cocinas')) ? 'selected' : '' }}">
        <a href="/cocinas">
            Cocinas
        </a>
    </li>

    <li class="menu__item {{ (request()->is('rehabilitaciones')) ? 'selected' : '' }}">
        <a href="/rehabilitaciones">
            Rehabilitaciones
        </a>
    </li>

    <li class="menu__item {{ (request()->is('parquets')) ? 'selected' : '' }}">
        <a href="/parquets">
            Parquets
        </a>
    </li>

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
