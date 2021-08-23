@extends('adminlte::page')

@section('title', ' Eivissa Menu')

@section('content_header')
    <div class="page-header section__title">
        <h1>Barra de navegación | <small>Eivissa Decoracio</small></h1>
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
                                        
                                        <td style="vertical-align: middle;" class="text-capitalize">{{$item->nombre}}</td>

                                        <td style="vertical-align: middle;" class="text-capitalize">{{$item->translation['nombre_en']}}</td>
                                        
                                        <td>
                                            <button title="Editar"  class="btn btn-warning" id="btn_edit" data-toggle="modal" data-target="#editMenuModal" data-menu-item-id="{{$item->id}}" style="margin-right: 20px;"><i class="fas fa-edit"></i></button>
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

{{-- Modal para editar menu - update_modal --}}
@include('admin.modules._parts.menu_modal')
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .modal__inputs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            grid-gap: 30px;
        }

        .input__spanish,
        .input__english {
            display: flex;
            align-items: center;
            flex-grow: 1;
        }

        .input__label {
            margin: 0 7px;
        }

        .input__text {
            display: inline;
            flex-grow: 1;
            width: auto;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .input__img {
            width: 30px;
            height: 21px;
        }
        
        .modal__buttons {
            text-align: center;
            margin: 30px 0px 20px;
        }
        
        .modal__buttons button {
            margin: 0 10px;
        }
    </style>
@stop

@section('js')
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
                error: (err) => console.log({status: 'Not Succes', err})
            })
        }

        /* Modal Content */
        $('#editMenuModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var dataId = button.attr('data-menu-item-id');
        $('#modalFormUpdate').attr('action', '/admin/category_menu/edit/' + dataId);
        $.ajax({
            url: '/admin/category_menu/getDataByAjax/' + dataId,
            type: 'GET',
            success: function(data){
                console.log(data)
                $('#menu_nombre_en').val(data.translation.nombre_en);
                $('#menu_nombre_es').val(data.nombre);
            },
            error: function(error){ console.log(error);}
        });        
        })
    })
    </script>
@stop

