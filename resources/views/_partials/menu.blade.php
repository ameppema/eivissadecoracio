<ul class="menu-mobile">
    <li class="language">
        <a class="spanish {{session()->get('locale') == 'es' ? 'active' : '' }}" href="{{route('lang', ['es'])}}">
            <img src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Language">
            <p>ES</p>
        </a>

        <a class="english {{session()->get('locale') == 'en' ? 'active' : '' }}" href="{{route('lang', ['en'])}}">
            <img src="/images/navbar/lang_en.png" alt="Eivissa Decoracio Language">
            <p>EN</p>
        </a>
    </li>

    <li class="menu__item {{ (request()->routeIs('home')) ? 'selected' : '' }}">
        <a href="{{route('home', session()->get('locale')) }}">
            Home
        </a>
    </li>

    @foreach($menu as $menuItem)
      <li class="menu__item {{ (request()->is('*/' . $menuItem->ruta)) ? 'selected' : '' }}">
          <a href="{{$menuItem->ruta}}">
              {{$menuItem->nombre}}
          </a>
      </li>
    @endforeach

</ul>

<!-- Inicia Menu de Escritorio -->

<ul class="menu-desktop">
    <li class="menu__item {{ (request()->routeIs('home')) ? 'selected' : '' }}">
        <a href="{{route('home', session()->get('locale'))}}">
            Home
        </a>
    </li>

    @foreach($menu as $menuItem)
      <li class="menu__item {{ (request()->is('*/'.$menuItem->ruta)) ? 'selected' : '' }}">
          <a href="{{route($menuItem->ruta, ['locale'=> session()->get('locale')])}}">
              {{$menuItem->nombre}}
          </a>
      </li>
    @endforeach

    <li class="language">
        <a class="spanish {{session()->get('locale') == 'es' ? 'active' : 'inactive' }}" href="{{route('lang', ['es'])}}">
            <img src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Language">
            <p>ES</p>
        </a>

        <a class="english {{session()->get('locale') == 'en' ? 'active' : 'inactive' }}" href="{{route('lang', ['en'])}}">
            <img src="/images/navbar/lang_en.png" alt="Eivissa Decoracio Language">
            <p>EN</p>
        </a>
    </li>
</ul>
