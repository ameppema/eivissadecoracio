@if(count($slide))
<table class="table">
    <thead>
        <tr>
            {{-- Slide Order --}}
            <th style="width: 5%; border-bottom: none;">#</th>
            
            {{-- Slide Image --}}
            <th style="width: 15%; border-bottom: none;">Imagen</th>
            
            {{-- Slide Title Spanish --}}
            <th style="width: 15%; border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                Título
            </th>

            {{-- Slide Description Spanish --}}
            <th style="width: 20%; border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                Descripción
            </th>

            {{-- Slide Title English --}}
            <th style="width: 15%; border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                Título
            </th>

            {{-- Slide Description English --}}
            <th style="width: 20%; border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                Descripción
            </th>

            {{-- Slide Edit --}}
            <th style="width: 10%; border-bottom: none;">Acciones</th>
        </tr>
    </thead>
    
    <tbody id="table-edit">
        @foreach($slide as $slideItem)
        <tr>
            {{-- Slide Order --}}
            <th style="vertical-align: middle;" scope="row">{{$loop->iteration}}</th>
            
            {{-- Slide Image --}}
            <td style="width: 150px;"><img style="width: inherit;" src="/storage/{{$slideItem->imagen}}" class="card-img" alt="Slide Item"></td>
            
            {{-- Slide Title Spanish --}}
            <td style="vertical-align: middle;">{{ $slideItem->titulo }}</td>
            
            {{-- Slide Description Spanish --}}
            <td style="vertical-align: middle;">{{$slideItem->descripcion}}</td>
            
            {{-- Slide Title English --}}
            <td style="vertical-align: middle;">{{ $slideItem->translation['titulo_en'] }}</td>

            {{-- Slide Description English --}}
            <td style="vertical-align: middle;">{{$slideItem->translation['descripcion_en']}}</td>

            {{-- Slide Actions --}}
            <td style="vertical-align: middle; padding: 0 .75rem;">
                {{-- Slide Edit --}}
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$slideItem->id}}">
                    <i class="fas fa-pencil-alt" data-slideid="{{$slideItem->id}}"></i>
                </button>

                {{-- Slide Remove --}}
                <form style="display: inline;" action="{{url('admin/slide/' .$slideItem->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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