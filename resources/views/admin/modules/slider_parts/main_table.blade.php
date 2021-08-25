@if(count($slide))
<table class="table">
    <thead>
        <tr class="slider__head">
            {{-- Slide Order --}}
            <th class="head__order">#</th>
            
            {{-- Slide Image --}}
            <th class="head__image">Imagen</th>
            
            {{-- Slide Title Spanish --}}
            <th class="head__title">
                <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                Título
            </th>

            {{-- Slide Description Spanish --}}
            <th class="head__description">
                <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                Descripción
            </th>

            {{-- Slide Title English --}}
            <th class="head__title">
                <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                Título
            </th>

            {{-- Slide Description English --}}
            <th class="head__description">
                <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                Descripción
            </th>

            {{-- Slide Edit --}}
            <th class="head__actions">Acciones</th>
        </tr>
    </thead>
    
    <tbody id="table-edit">
        @foreach($slide as $slideItem)
        <tr class="slider__item">
            {{-- Slide Order --}}
            <td class="item__order">
                {{$loop->iteration}}
            </td>
            
            {{-- Slide Image --}}
            <td class="item__image">
                <img src="/storage/{{$slideItem->imagen}}" class="card-img" alt="Slide Item">
            </td>
            
            {{-- Slide Title Spanish --}}
            <td class="item__title">
                {{ $slideItem->titulo }}
            </td>
            
            {{-- Slide Description Spanish --}}
            <td class="item__description">
                {{$slideItem->descripcion}}
            </td>
            
            {{-- Slide Title English --}}
            <td class="item__title">
                {{ $slideItem->translation['titulo_en'] }}
            </td>

            {{-- Slide Description English --}}
            <td class="item__description">
                {{$slideItem->translation['descripcion_en']}}
            </td>

            {{-- Slide Actions --}}
            <td class="item__actions">
                {{-- Slide Edit --}}
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$slideItem->id}}">
                    <i class="fas fa-pencil-alt" data-slideid="{{$slideItem->id}}"></i>
                </button>

                {{-- Slide Remove --}}
                <form action="{{url('admin/slide/' .$slideItem->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-muted">No Slide Items</h2>
        </div>
    </div>
@endif