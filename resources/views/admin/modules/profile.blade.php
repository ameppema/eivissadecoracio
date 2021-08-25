@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>Perfil de Usuario | Role : @role('Admin') Administrador @else Usuario @endrole | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
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
            
            <section class="name__items">
                <!-- Item ID -->
                <div>1</div>

                <!-- Item Full Name -->
                <div>Paul Marquez</div>
                
                <!-- Item Nickname -->
                <div>Paul</div>
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
            
            <section class="mail__items">
                <!-- Item Mail -->
                <div>ameppema@hotmail.com</div>

                <!-- Item Password -->
                <div>***************</div>
                
                <!-- Item Confirmation -->
                <div>***************</div>
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
                <div>Editor</div>

                <!-- Item Action -->
                <div>Activo</div>
                
                <!-- Item Action -->
                <div>27/08/2021 - 13:00</div>
            </section>
        </div>

        <div class="profile__buttons">
            <!-- Acciones -->
            <button title="Actualizar" class="btn btn-success">
                Actualizar
            </button>

            <button title="Cancelar" class="btn btn-danger">
                Cancelar
            </button>
        </div>
    </section>
@stop

@section('css')
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