<ul class="menu-mobile">
    <li class="language">
        <a class="spanish active" href="lang/es">
            <img src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Language">
            <p>ES</p>
        </a>

        <a class="english" href="lang/en">
            <img src="/images/navbar/lang_en.png" alt="Eivissa Decoracio Language">
            <p>EN</p>
        </a>
    </li>

    <li class="menu__item {{ (request()->is('/')) ? 'selected' : '' }}">
        <a href="/">
            Home
        </a>
    </li>

    @foreach($menu as $menuItem)
      <li class="menu__item {{ (request()->is($menuItem->ruta)) ? 'selected' : '' }}">
          <a href="{{$menuItem->ruta}}">
              {{$menuItem->nombre}}
          </a>
      </li>
    @endforeach

</ul>

<!-- Inicia Menu de Escritorio -->

<ul class="menu-desktop">
    <li class="menu__item {{ (request()->is('/')) ? 'selected' : '' }}">
        <a href="/">
            Home
        </a>
    </li>

    @foreach($menu as $menuItem)
      <li class="menu__item {{ (request()->is($menuItem->ruta)) ? 'selected' : '' }}">
          <a href="{{$menuItem->ruta}}">
              {{$menuItem->nombre}}
          </a>
      </li>
    @endforeach

    <li class="language">
        <a class="spanish active" href="lang/es">
            <img src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Language">
            <p>ES</p>
        </a>

        <a class="english inactive" href="lang/en">
            <img src="/images/navbar/lang_en.png" alt="Eivissa Decoracio Language">
            <p>EN</p>
        </a>
    </li>
</ul>
