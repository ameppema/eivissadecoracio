<table class="table">
    <thead>
        <tr>
            <th style="border-bottom: none;">#</th>

            <th style="border-bottom: none;">Imagen</th>

            <th style="border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                Título
            </th>

            <th style="border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                Descripción
            </th>

            <th style="border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                Título
            </th>

            <th style="border-bottom: none;">
                <img class="title__image" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                Descripción
            </th>

            <th style="border-bottom: none;">Acciones</th>
        </tr>
    </thead>
    
    <tbody id="table-edit">
        @foreach($slide as $slideItem)
        <tr>
            {{-- Order Slide --}}
            <th style="vertical-align: middle;" scope="row">{{$loop->iteration}}</th>
            
            {{-- Image Slide --}}
            <td style="width: 150px;"><img style="width: inherit;" src="/storage/{{$slideItem->imagen}}" class="card-img" alt="Slide Item"></td>
            
            {{-- Title & Description in Spanish --}}
            <td style="vertical-align: middle;">{{ $slideItem->titulo }}</td>
            <td style="vertical-align: middle;">{{$slideItem->descripcion}}</td>
            
            {{-- Title & Description in English --}}
            <td style="vertical-align: middle;">{{ $slideItem->titulo }}</td>
            <td style="vertical-align: middle;">{{$slideItem->descripcion}}</td>

            {{-- Edit Slide --}}
            <td style="vertical-align: middle; padding: 0 .75rem;">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$slideItem->id}}">
                    <i class="fas fa-pencil-alt" data-slideid="{{$slideItem->id}}"></i>
                </button>
            </td>
            
            {{-- Remove Slide --}}
            <td style="vertical-align: middle; padding: 0;">
                <form action="{{url('admin/slide/' .$slideItem->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>