@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>Perfil de @role('Admin') Administrador @else Editor @endrole | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
{{--Alert error--}}
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
<form action="{{route('admin.profile.update',['user'=> $userData->id])}}" method="POST">
    @csrf
    @method('put')
    <section class="content user__profile">
        <div class="profile__name">
            <section class="name__titles">
                <!-- Title ID -->
                <div>ID</div>

                <!-- Title Full Name -->
                <div>Nombre completo</div>
                
                <!-- Title Nickname -->
                <div>Nickname</div>
            </section>
            
            <section class="mt-2 form-row">
                <!-- Item ID -->
                <div class="col-4">{{$userData->id}}</div>

                <!-- Item Full Name -->
                <div class="col-4">
                    <input name="name" class="form-control" type="text" value="{{$userData->name}}">
                </div>
                
                <!-- Item Nickname -->
                <div class="col-4">
                    <input name="nickname" class="form-control" type="text" value="{{$userData->nickname ?? 'Sin Nickname aun'}}">
                </div>
            </section>
        </div>
        
        <div class="profile__mail">
            <section class="mail__titles">
                <!-- Title Mail -->
                <div>Correo</div>

                <!-- Title Password -->
                <div>Password</div>
                
                <!-- Title Confirmation -->
                <div>Confirmación</div>
            </section>
            
            <section class="mt-2 form-row">
                <!-- Item Mail -->
                <div class="col-4">
                    <input name="email" class="form-control" type="email" value="{{$userData->email}}">
                </div>

                <!-- Item Password -->
                <div class="col">
                    <input name="password" class="form-control" type="password" placeholder="">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                    ¡Aviso: Solo si quiere cambiar su contraseña llene este campo!
                    </small>
                </div>
                
                <!-- Item Confirmation -->
                <div class="col">
                    <input name="password_confirmation" class="form-control" type="password" placeholder="">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                    ¡Aviso: Solo si quiere cambiar su contraseña llene este campo!
                    </small>
                </div>
            </section>
        </div>
        
        <div class="profile__action">
            <section class="action__titles">
                <!-- Title Action -->
                <div>Rol</div>

                <!-- Title Action -->
                <div>Estado</div>
                
                <!-- Title Action -->
                <div>Última sesión</div>
            </section>
            
            <section class="action__items">
                <!-- Item Action -->
                <div class="col-4">
                    {{$userData->roles[0]->name ?? "Sin Rol"}}
                </div>

                <!-- Item Action -->
                <div class="col">
                    {{$userData->status == 1 ? "Activo" : "Inactivo"}}
                </div>
                
                <!-- Item Action -->
                <div class="col">{{$userData->last_login_at}}</div>
            </section>
        </div>

        <div class="profile__buttons">
            <!-- Acciones -->
            <button  type="submit" title="Actualizar" class="btn btn-success">
                Actualizar
            </button>

            <button title="Cancelar" class="btn btn-danger">
                Cancelar
            </button>
        </div>
    </section>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/alert.css')}}">
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .profile__name,
        .profile__mail,
        .profile__action {
            margin-bottom: 1rem;
            padding: 1.25rem;
            border-radius: .25rem;
            background-color: #fff;
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        }
        
        .name__titles,
        .mail__titles,
        .action__titles {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 1fr;
            font-weight: bold;
            padding: .75rem;
            border-bottom: 2px solid #dee2e6;
        }
        
        .name__items,
        .mail__items,
        .action__items {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 1fr;
            padding: .75rem;
        }
        
        .name__items div,
        .mail__items div,
        .action__items div {
            vertical-align: middle;
        }

        .profile__buttons {
            margin-top: 50px;
            text-align: center;
        }
        
        .profile__buttons button {
            margin: 0 10px;
        }
    </style>
@stop
@section('js')
    <script src="{{asset('js/utils.js')}}"></script>
@stop