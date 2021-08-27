@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>@role('Admin') Administrador @else Editor @endrole de Permisos | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="content permissions">
        <section class="permission__titles">
            <!-- Title Role -->
            <div>Rol</div>

            <!-- Title Read -->
            <div>Leer</div>
            
            <!-- Title Update -->
            <div>Actualizar</div>
            
            <!-- Title Create -->
            <div>Crear</div>
            
            <!-- Title Delete -->
            <div>Borrar</div>
        </section>
        
        <section class="permission__users">
            <!-- User Role -->
            <div>Administrador</div>

            <!-- User Read -->
            <div class="permission">
                <input id="permission__read" type="checkbox" checked>
            </div>

            <!-- User Update -->
            <div class="permission">
                <input id="permission__update" type="checkbox" checked>
            </div>
            
            <!-- User Create -->
            <div class="permission">
                <input id="permission__create" type="checkbox" checked>
            </div>
            
            <!-- User Delete -->
            <div class="permission">
                <input id="permission__delete" type="checkbox" checked>
            </div>
        </section>    
        
        <section class="permission__users">
            <!-- User Role -->
            <div>Editor</div>

            <!-- User Read -->
            <div class="permission">
                <input id="permission__read" type="checkbox" checked>
            </div>

            <!-- User Update -->
            <div class="permission">
                <input id="permission__update" type="checkbox" checked>
            </div>
            
            <!-- User Create -->
            <div class="permission">
                <input id="permission__create" type="checkbox" checked>
            </div>
            
            <!-- User Delete -->
            <div class="permission">
                <input id="permission__delete" type="checkbox">
            </div>
        </section>    
        
        <section class="permission__users">
            <!-- User Role -->
            <div>Invitado</div>

            <!-- User Read -->
            <div class="permission">
                <input id="permission__read" type="checkbox" checked>
            </div>

            <!-- User Update -->
            <div class="permission">
                <input id="permission__update" type="checkbox">
            </div>
            
            <!-- User Create -->
            <div class="permission">
                <input id="permission__create" type="checkbox">
            </div>
            
            <!-- User Delete -->
            <div class="permission">
                <input id="permission__delete" type="checkbox">
            </div>
        </section>    
    </section>
    
    <div class="permission__buttons">
        <!-- Acciones -->
        <button title="Actualizar" class="btn btn-success">
            Actualizar
        </button>

        <button title="Cancelar" class="btn btn-danger">
            Cancelar
        </button>
    </div>
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .permissions {
            margin-bottom: 1rem;
            padding: 1.25rem;
            border-radius: .25rem;
            background-color: #fff;
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        }
        
        .permission__titles {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: 1fr;
            font-weight: bold;
            padding: .75rem;
            border-bottom: 1px solid #dee2e6;
        }
        
        .permission__users {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: 1fr;
            padding: .75rem;
            border-top: 1px solid lightgray;
        }

        .permission__buttons {
            margin-top: 50px;
            text-align: center;
        }
        
        .permission__buttons button {
            margin: 0 10px;
        }

        .permission input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }
    </style>
@stop