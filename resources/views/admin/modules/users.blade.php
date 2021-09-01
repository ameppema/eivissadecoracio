@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>@role('Admin') Administrador @else Editor @endrole de Usuarios | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
{{--Alert Error--}}
@if($errors->any())
    <x-adminlte-alert class="bg-red " icon="fa-lg fas fa-exclamation-circle" title="Error en el Formulario" dismissable>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-adminlte-alert> 
@endif
{{--Alert response--}}
@if(session()->has('message'))
    <div class="error-notice" id="close-alert">
        <div class="oaerror {{session()->get('alertStatus')}}">
        <strong>Muy Bien!</strong> - {{session()->get('message')}}
        </div> 
    </div>
@endif
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table class="table users-container">
                    <thead class="users__title">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Nickname</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Sesión</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="users__items">
                        @foreach($users as $user) 
                        <tr>
                            <!-- ID -->
                            <td>{{$user->id}}</td>

                            <!-- Nombre -->
                            <td>{{$user->name}}</td>
                            
                            <!-- Nick -->
                            <td>{{$user->nickname}}</td>
                            
                            <!-- Correo -->
                            <td>{{$user->email}}</td>
                            
                            <!-- Rol -->
                            <td>{{$user->roles[0]->name ?? 'Sin role' }}</td>

                            <!-- Sesión -->
                            <td>{{$user->last_login_at ?? 'Aun no ha iniciado session'}}</td>

                            <!-- Estado -->
                            <td>{{$user->status == 1 ? 'Activo'  :'Inactivo'}}</td>
                            
                            <!-- Acciones -->
                            <td class="item__actions">
                                <button title="Editar"  data-clickModal="{{$user->id}}" data-toggle="modal" data-target="#editUserModal"  class="btn btn-warning">
                                    <i data-clickModal="{{$user->id}}" class="fas fa-edit"></i>
                                </button>

                                <form method="POST" action="{{route('admin.users.destroy',['id'=> $user->id])}}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button title="Eliminar" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                        
            </div>
        </div>
    </section>

    <div class="users__buttons">
        <!-- Acciones -->
        <button title="Actualizar" data-toggle="modal" data-target="#newUserModal" class="btn btn-success">
            Agregar Nuevo usuario
        </button>
    </div>

{{--Modal Update User--}}
    @include('admin.modules._parts.users-update-modal')
{{--End Modal--}}
{{--Modal New USer--}}
    @include('admin.modules._parts.users-create-modal')
{{--End Modal--}}
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/alert.css')}}">
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .users__items tr td {
            vertical-align: middle;
        }

        .item__actions {
            padding: 0 .75rem;
        }

        .users__buttons {
            margin-top: 50px;
            text-align: center;
        }
        
        .users__buttons button {
            margin: 0 10px;
        }
    </style>
@stop

@section('js')
    <script src="{{asset('js/utils.js')}}"></script>
    <script type="text/javascript" defer>

        $('[data-clickModal]').on('click', getDataByAjax)

        function getDataByAjax(e){
            const userId = e.target.getAttribute('data-clickModal');
            const url = '/admin/users-roles/' + userId;
            const UserForm = $('#modalUserUpdate');
            const UserFormName = $('#userNamePlaceHolder');
            
            /* Ajax */
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data){
                    $('#modalUserUpdate').attr('action', '/admin/user/' + data.id);
                    console.log(data);
                    UserFormName.text(data.name);

                },
                error: function(err){
                    console.error(err)
                }
            });
        }
    </script>
@stop