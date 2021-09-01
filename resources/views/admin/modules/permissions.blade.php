@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>@role('Admin') Administrador @else Editor @endrole de Permisos | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="permissions" id="permisionsContainer_2">     
        <div class="permission__titles" >
            <div class="title__section">Secciones</div>

            <div class="title__menu">Menú</div>
            
            <div class="title__slider">Slider</div>
            
            <div class="title__history">Historia</div>

            <div class="title__construction">Obras</div>
            
            <div class="title__restorations">Rehabilitaciones</div>

            <div class="title__kitchens">Cocinas</div>
            
            <div class="title__interiors">Interiores</div>

            <div class="title__hardwood">Parquets</div>

            <div class="title__partners">Partners</div>

            <div class="title__roles">Roles</div>
            
            <div class="title__permissions">Permisos</div>
            
            <div class="title__profile">Perfil</div>
            
            <div class="title__users">Usuarios</div>

            <div class="title__actions">Acciones</div>
        </div>

        @include('admin.modules._parts.permissions-rows')
        
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
@section('js')
<script type="application/javascript">
    const urlController = '/admin/permissions/update';
    const DataContainer = $('#permisionsContainer_2');

    DataContainer.on('click', getCheckData)


    function getCheckData(event){
        let role, permission, target, isChecked;
        target = event.target;

        if(!target.getAttribute('type') || target.getAttribute('type') != 'checkbox'){
            return null;
        }
        
        let checkboxData = {
            "role": target.name,
            "permission": target.value,
            "isChecked": target.checked
        }

        putByAjax(urlController,checkboxData);
        
        console.log(checkboxData);
    }

    function putByAjax(url = '', values = {}){
        $.ajax({
            url: url,
            type: 'PUT',
            data: {data: JSON.stringify(values), _token: '{{csrf_token()}}'},
            success: function success(data){
                let response = JSON.parse(data)
                console.log(response)
            },  
            error: function error(err){
                console.error(err);
            }
        });
    }
</script>
@stop