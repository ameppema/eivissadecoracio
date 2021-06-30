<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Imagen</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody id="table-edit">
        @foreach($slide as $slideItem)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $slideItem->titulo }}</td>
            <td class="w-25"><img src="http://eivissadecoracio.test/storage/{{$slideItem->imagen}}" class="card-img" alt="Slide Item"></td>
            <td>{{$slideItem->descripcion}}</td>
            <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCustom" data-slideid="{{$slideItem->id}}" ><i class="fas fa-pencil-alt" data-slideid="{{$slideItem->id}}"></i></button>
            </td>
            <td>
                <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>