@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>@role('Admin') Administrador @else Editor @endrole de Roles | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="roles">
        <div class="role__titles">
            <div class="title__role">Permisos</div>
            
            <div class="title__read">Ver</div>
            
            <div class="title__update">Editar</div>
            
            <div class="title__create">Crear</div>
            
            <div class="title__delete">Borrar</div>
            
            <div class="title__actions">Acciones</div>
        </div>
        
        <form action="#" class="role__admin" method="POST">
            @csrf
            @method('update')

            <div class="admin__title">
                Admin
            </div>
            
            <div class="admin__read">
                <input id="admin__read" type="checkbox" checked>
            </div>

            <div class="admin__update">
                <input id="admin__update" type="checkbox" checked>
            </div>
            
            <div class="admin__create">
                <input id="admin__create" type="checkbox" checked>
            </div>

            <div class="admin__delete">
                <input id="admin__delete" type="checkbox" checked>
            </div>
            
            <div class="admin__buttons">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
        
        <form action="#" class="role__editor" method="POST">
            @csrf
            @method('update')

            <div class="editor__title">
                Editor
            </div>
            
            <div class="editor__read">
                <input id="editor__read" type="checkbox">
            </div>

            <div class="editor__update">
                <input id="editor__update" type="checkbox">
            </div>
            
            <div class="editor__create">
                <input id="editor__create" type="checkbox">
            </div>

            <div class="editor__delete">
                <input id="editor__delete" type="checkbox">
            </div>
            
            <div class="editor__buttons">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
        
        <form action="#" class="role__guest" method="POST">
            @csrf
            @method('update')

            <div class="guest__title">
                Guest
            </div>
            
            <div class="guest__read">
                <input id="guest__read" type="checkbox">
            </div>

            <div class="guest__update">
                <input id="guest__update" type="checkbox">
            </div>
            
            <div class="guest__create">
                <input id="guest__create" type="checkbox">
            </div>

            <div class="guest__delete">
                <input id="guest__delete" type="checkbox">
            </div>
            
            <div class="guest__buttons">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
        
        <form action="#" class="role__special" method="POST">
            @csrf
            @method('update')

            <div class="special__title">
                Special
            </div>
            
            <div class="special__read">
                <input id="special__read" type="checkbox">
            </div>

            <div class="special__update">
                <input id="special__update" type="checkbox">
            </div>
            
            <div class="special__create">
                <input id="special__create" type="checkbox">
            </div>

            <div class="special__delete">
                <input id="special__delete" type="checkbox">
            </div>
            
            <div class="special__buttons">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
        
        {{-- <div class="roles__buttons">
            <!-- Acciones -->
            <button title="guardar" class="btn btn-success">
                Guardar
            </button>
    
            <button title="cancelar" class="btn btn-danger">
                Cancelar
            </button>
        </div> --}}
    </section>
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .roles {
            margin-bottom: 1rem;
            padding: 1.25rem;
            border-radius: .25rem;
            background-color: #fff;
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        }
        
        .role__titles {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: 1fr;
            font-weight: bold;
            padding: .75rem;
            border-bottom: 1px solid #dee2e6;
        }
        
        .role__titles div {
            display: flex;
            align-items: center;
        }
        
        .role__admin,
        .role__editor,
        .role__guest,
        .role__special {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: 1fr;
            padding: .75rem;
            border-top: 1px solid lightgray;
        }

        .roles__buttons {
            margin: 30px 0;
            text-align: center;
        }
        
        .roles__buttons button {
            margin: 0 10px;
        }

        .role__admin div input[type="checkbox"],
        .role__editor div input[type="checkbox"],
        .role__guest div input[type="checkbox"],
        .role__special div input[type="checkbox"] {
            display: flex;
            justify-content: center;
            align-items: center;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 32px;
            height: 32px;
            background-color: lightgray;
            border-radius: 2px;
            cursor: pointer;
        }
        
        .role__admin div input[type="checkbox"]::after,
        .role__editor div input[type="checkbox"]::after,
        .role__guest div input[type="checkbox"]::after,
        .role__special div input[type="checkbox"]::after {
            display: none;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: "\f00c";
            font-size: 1em;
            color: white;
        }
        
        .role__admin div input[type="checkbox"]:hover,
        .role__editor div input[type="checkbox"]:hover,
        .role__guest div input[type="checkbox"]:hover,
        .role__special div input[type="checkbox"]:hover {
            background-color: gray;
        }
        
        .role__admin div input[type="checkbox"]:checked,
        .role__editor div input[type="checkbox"]:checked,
        .role__guest div input[type="checkbox"]:checked,
        .role__special div input[type="checkbox"]:checked {
            background-color: #28a745;
        }
        
        .role__admin div input[type="checkbox"]:checked:after,
        .role__editor div input[type="checkbox"]:checked:after,
        .role__guest div input[type="checkbox"]:checked:after,
        .role__special div input[type="checkbox"]:checked:after {
            display: block;
        }
        
        .admin__buttons button,
        .editor__buttons button,
        .guest__buttons button,
        .special__buttons button {
            display: inline-block;
            margin-right: 5px;
            color: white;
            font-weight: 400;
            font-size: 1.2em;
            border-radius: .25em;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        
        .button__save {
            background-color: #28a745;
            border: 1px solid transparent;
        }
        
        .button__cancel {
            background-color: #dc3545;
            border: 1px solid transparent;
        }
    </style>
@stop