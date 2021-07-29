<table class="table">
    <thead>
        <tr>
            <th style="border-bottom: none;" scope="col">#</th>
            <th style="border-bottom: none;" scope="col">Título</th>
            <th style="border-bottom: none;" scope="col">Imagen</th>
            <th style="border-bottom: none;" scope="col">Descripción</th>
            <th style="border-bottom: none;" scope="col">Acciones</th>
        </tr>
    </thead>
    
    <tbody id="table-edit">
        @foreach($slide as $slideItem)
        <tr>
            <th style="vertical-align: middle;" scope="row">{{$loop->iteration}}</th>
            <td style="vertical-align: middle;">{{ $slideItem->titulo }}</td>
            <td style="width: 150px;"><img src="/storage/{{$slideItem->imagen}}" class="card-img" alt="Slide Item"></td>
            <td style="vertical-align: middle;">{{$slideItem->descripcion}}</td>
            <td style="vertical-align: middle; padding: 0 .75rem;">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$slideItem->id}}">
                    <i class="fas fa-pencil-alt" data-slideid="{{$slideItem->id}}"></i>
                </button>
            </td>
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