@extends('adminlte::page')

@section('title', ' Eivissa Menu')

@section('content_header')
    <div class="page-header section__title">
        <h1>Eivissa Decoracio | Barra de navegación</h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Menu new item --}}
                <div class="card">
                    <div class="card-body">
                        @include('admin.modules._parts.menu_form')
                    </div>
                </div>

                {{-- Menu edit item --}}
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="20%">Orden</th>
                                    
                                    <th width="30%">
                                        <img style="width: 30px; height: 21px; margin-bottom: 3px;" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                                        Enlace en Español
                                    </th>
                                    
                                    <th width="30%">
                                        <img style="width: 30px; height: 21px; margin-bottom: 3px;" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                                        Enlace en Ingles
                                    </th>
                                    
                                    <th width="20%">Acciones</th>
                                </tr>
                            </thead>

                            <tbody id="mylist">
                                @foreach($menu as $item)
                                    <tr data-id="{{$item->id}}">
                                        <td style="vertical-align: middle;" data-id="{{$item->id}}">{{$item->sort_order}}</td>
                                        
                                        <td style="vertical-align: middle;" class="text-capitalize collapse show thisone" >{{$item->nombre}}</td>

                                        <td style="vertical-align: middle;" class="text-capitalize collapse show thisone" >{{$item->nombre}}</td>
                                        
                                        <td style="vertical-align: middle;" class="text-capitalize collapse editinput w-25">
                                            <form action="{{url('admin/category_menu'. '/edit/' . $item->id )}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="text" name="nombre" value="{{$item->nombre}}" class="text-capitalize">
                                                <button title="Guardar" type="submit" class="btn btn-info"><i class="fas fa-check-square"></i></button>
                                            </form>
                                        </td>

                                        <td>
                                            <button title="Editar"  class="btn btn-warning edit-category" style="margin-right: 20px;"><i class="fas fa-edit"></i></button>
                                            
                                            <form action="{{url('admin/category_menu'.'/delete/' . $item->id )}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button title="Eliminar"  class="btn btn-danger delete-category"><i class="fas fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal para editar slide - update_modal --}}
@include('admin.modules.slider_parts.update_modal')
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }
    </style>
@stop

@section('js')
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>

    <script type="application/javascript" defer>

    $(document).ready(() => {
        /* Sorteable */
        const SortList = $('#mylist'); 

        SortList.sortable({
            animation: 150,
            easing: "cubic-bezier(1, 0, 0, 1)",
            ghostClass : 'bg-light',
            chosenClass : 'bg-light',
            onEnd: getOrder
        });

        function getOrder(){
            let ordered = SortList.sortable('toArray');
            let orderUpdated = [];
            ordered.forEach((id, index) => {
                index += 1;
                orderUpdated.push({index, id});
            });

            $.ajax({
                type: 'PUT',
                url: 'category_menu/sort',
                data: {data: JSON.stringify(orderUpdated), _token: '{{csrf_token()}}'},
                success: (data) => console.log('%c Orden Cambiado Correctamente','background-color:green'),
                error: (err) => console.log('Not Succes')
            })
        }

        /* Editable */
        let btnEdit = $('.edit-category');
        btnEdit.on('click', function(){
            $('.editinput').toggleClass('collapse');
            $('.thisone').toggleClass('show');
        })
    })
    </script>
@stop

