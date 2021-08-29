@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>@role('Admin') Administrador @else Editor @endrole de Permisos | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="permissions">     
        <div class="permission__titles">
            <div class="title__section">Secciones</div>
            
            <div class="title__dashboard">Dashboard</div>

            <div class="title__menu">Menú</div>
            
            <div class="title__slider">Slider</div>
            
            <div class="title__history">Historia</div>

            <div class="title__construction">Obras</div>
            
            <div class="title__restorations">Rehabilitaciones</div>

            <div class="title__interiors">Interiores</div>

            <div class="title__kitchens">Cocinas</div>

            <div class="title__hardwood">Parquets</div>

            <div class="title__partners">Partners</div>

            <div class="title__users">Usuarios</div>

            <div class="title__roles">Roles</div>

            <div class="title__permissions">Permisos</div>

            <div class="title__profile">Perfil</div>

            <div class="title__actions">Acciones</div>
        </div>
        
        <form action="#" class="permission__admin" method="POST">
            @csrf
            @method('update')

            <div class="admin__title">Admin</div>
            
            <div class="admin__dashboard">
                <input id="admin__dashboard" type="checkbox">
            </div>

            <div class="admin__menu">
                <input id="admin__menu" type="checkbox">
            </div>
            
            <div class="admin__slider">
                <input id="admin__slider" type="checkbox">
            </div>
            
            <div class="admin__history">
                <input id="admin__history" type="checkbox">
            </div>

            <div class="admin__construction">
                <input id="admin__construction" type="checkbox">
            </div>
            
            <div class="admin__restorations">
                <input id="admin__restorations" type="checkbox">
            </div>

            <div class="admin__interiors">
                <input id="admin__interiors" type="checkbox">
            </div>

            <div class="admin__kitchens">
                <input id="admin__kitchens" type="checkbox">
            </div>

            <div class="admin__hardwood">
                <input id="admin__hardwood" type="checkbox">
            </div>

            <div class="admin__partners">
                <input id="admin__partners" type="checkbox">
            </div>

            <div class="admin__users">
                <input id="admin__users" type="checkbox">
            </div>

            <div class="admin__roles">
                <input id="admin__roles" type="checkbox">
            </div>

            <div class="admin__permissions">
                <input id="admin__permissions" type="checkbox">
            </div>

            <div class="admin__profile">
                <input id="admin__profile" type="checkbox">
            </div>

            <div class="admin__actions">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
        
        <form action="#" class="permission__editor" method="POST">
            @csrf
            @method('update')

            <div class="editor__title">Editor</div>
            
            <div class="editor__dashboard">
                <input id="editor__dashboard" type="checkbox">
            </div>

            <div class="editor__menu">
                <input id="editor__menu" type="checkbox">
            </div>
            
            <div class="editor__slider">
                <input id="editor__slider" type="checkbox">
            </div>
            
            <div class="editor__history">
                <input id="editor__history" type="checkbox">
            </div>

            <div class="editor__construction">
                <input id="editor__construction" type="checkbox">
            </div>
            
            <div class="editor__restorations">
                <input id="editor__restorations" type="checkbox">
            </div>

            <div class="editor__interiors">
                <input id="editor__interiors" type="checkbox">
            </div>

            <div class="editor__kitchens">
                <input id="editor__kitchens" type="checkbox">
            </div>

            <div class="editor__hardwood">
                <input id="editor__hardwood" type="checkbox">
            </div>

            <div class="editor__partners">
                <input id="editor__partners" type="checkbox">
            </div>

            <div class="editor__users">
                <input id="editor__users" type="checkbox">
            </div>

            <div class="editor__roles">
                <input id="editor__roles" type="checkbox">
            </div>

            <div class="editor__permissions">
                <input id="editor__permissions" type="checkbox">
            </div>

            <div class="editor__profile">
                <input id="editor__profile" type="checkbox">
            </div>

            <div class="editor__actions">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
        
        <form action="#" class="permission__guest" method="POST">
            @csrf
            @method('update')

            <div class="guest__title">Guest</div>
            
            <div class="guest__dashboard">
                <input id="guest__dashboard" type="checkbox">
            </div>

            <div class="guest__menu">
                <input id="guest__menu" type="checkbox">
            </div>
            
            <div class="guest__slider">
                <input id="guest__slider" type="checkbox">
            </div>
            
            <div class="guest__history">
                <input id="guest__history" type="checkbox">
            </div>

            <div class="guest__construction">
                <input id="guest__construction" type="checkbox">
            </div>
            
            <div class="guest__restorations">
                <input id="guest__restorations" type="checkbox">
            </div>

            <div class="guest__interiors">
                <input id="guest__interiors" type="checkbox">
            </div>

            <div class="guest__kitchens">
                <input id="guest__kitchens" type="checkbox">
            </div>

            <div class="guest__hardwood">
                <input id="guest__hardwood" type="checkbox">
            </div>

            <div class="guest__partners">
                <input id="guest__partners" type="checkbox">
            </div>

            <div class="guest__users">
                <input id="guest__users" type="checkbox">
            </div>

            <div class="guest__roles">
                <input id="guest__roles" type="checkbox">
            </div>

            <div class="guest__permissions">
                <input id="guest__permissions" type="checkbox">
            </div>

            <div class="guest__profile">
                <input id="guest__profile" type="checkbox">
            </div>

            <div class="guest__actions">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
        
        <form action="#" class="permission__special" method="POST">
            @csrf
            @method('update')

            <div class="special__title">Special</div>
            
            <div class="special__dashboard">
                <input id="special__dashboard" type="checkbox">
            </div>

            <div class="special__menu">
                <input id="special__menu" type="checkbox">
            </div>
            
            <div class="special__slider">
                <input id="special__slider" type="checkbox">
            </div>
            
            <div class="special__history">
                <input id="special__history" type="checkbox">
            </div>

            <div class="special__construction">
                <input id="special__construction" type="checkbox">
            </div>
            
            <div class="special__restorations">
                <input id="special__restorations" type="checkbox">
            </div>

            <div class="special__interiors">
                <input id="special__interiors" type="checkbox">
            </div>

            <div class="special__kitchens">
                <input id="special__kitchens" type="checkbox">
            </div>

            <div class="special__hardwood">
                <input id="special__hardwood" type="checkbox">
            </div>

            <div class="special__partners">
                <input id="special__partners" type="checkbox">
            </div>

            <div class="special__users">
                <input id="special__users" type="checkbox">
            </div>

            <div class="special__roles">
                <input id="special__roles" type="checkbox">
            </div>

            <div class="special__permissions">
                <input id="special__permissions" type="checkbox">
            </div>

            <div class="special__profile">
                <input id="special__profile" type="checkbox">
            </div>

            <div class="special__actions">
                <button title="save" class="button__save">
                    <i class="fas fa-save"></i>
                </button>

                <button title="close" class="button__cancel">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </form>
    </section>
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .permissions {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            padding: 1.25rem;
            border-radius: .25rem;
            background-color: #fff;
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        }
        
        .permission__titles,
        .permission__admin,
        .permission__editor,
        .permission__guest,
        .permission__special {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: repeat(16, 1fr);
        }
        
        .permission__titles div,
        .permission__admin div,
        .permission__editor div,
        .permission__guest div,
        .permission__special div {
            display: flex;
            align-items: center;
            padding: .5em;
            border-top: 1px solid lightgray;
        }
        
        .permission__titles .title__section,
        .permission__admin .admin__title,
        .permission__editor .editor__title,
        .permission__guest .guest__title,
        .permission__special .special__title {
            display: flex;
            align-items: center;
            font-weight: bold;
            border-top: none;
            border-bottom: 1px solid lightgray;
        }

        .permission__admin div input[type="checkbox"],
        .permission__editor div input[type="checkbox"],
        .permission__guest div input[type="checkbox"],
        .permission__special div input[type="checkbox"] {
            display: flex;
            justify-content: center;
            align-items: center;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 20px;
            height: 20px;
            background-color: lightgray;
            border-radius: 2px;
            cursor: pointer;
        }
        
        .permission__admin div input[type="checkbox"]::after,
        .permission__editor div input[type="checkbox"]::after,
        .permission__guest div input[type="checkbox"]::after,
        .permission__special div input[type="checkbox"]::after {
            display: none;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: "\f00c";
            font-size: .8em;
            color: white;
        }
        
        .permission__admin div input[type="checkbox"]:hover,
        .permission__editor div input[type="checkbox"]:hover,
        .permission__guest div input[type="checkbox"]:hover,
        .permission__special div input[type="checkbox"]:hover {
            background-color: gray;
        }
        
        .permission__admin div input[type="checkbox"]:checked,
        .permission__editor div input[type="checkbox"]:checked,
        .permission__guest div input[type="checkbox"]:checked,
        .permission__special div input[type="checkbox"]:checked {
            background-color: #28a745;
        }
        
        .permission__admin div input[type="checkbox"]:checked:after,
        .permission__editor div input[type="checkbox"]:checked:after,
        .permission__guest div input[type="checkbox"]:checked:after,
        .permission__special div input[type="checkbox"]:checked:after {
            display: block;
        }

        .admin__actions button,
        .editor__actions button,
        .guest__actions button,
        .special__actions button {
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