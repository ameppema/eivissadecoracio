@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>@role('Admin') Administrador @else Editor @endrole de Roles | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div id="infoFeedback"></div>
        </div>
    </div>
    <section class="roles" id="permisionsContainer">
        <div class="role__titles">
            <div class="title__role">Permisos</div>
            
            <div class="title__create">Crear</div>
            
            <div class="title__read">Ver</div>
            
            <div class="title__update">Editar</div>
            
            
            <div class="title__delete">Borrar</div>
            
            <div class="title__actions">Acciones</div>
        </div>
        
        <!-- Filas y Columnas -->
        @include('admin.modules._parts.roles-rows')
        
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
        .role,
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

        .role div input[type="checkbox"],
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
        
        .role div input[type="checkbox"]::after,
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
        
        .role div input[type="checkbox"]:hover,
        .role__admin div input[type="checkbox"]:hover,
        .role__editor div input[type="checkbox"]:hover,
        .role__guest div input[type="checkbox"]:hover,
        .role__special div input[type="checkbox"]:hover {
            background-color: gray;
        }
        
        .role div input[type="checkbox"]:checked,
        .role__admin div input[type="checkbox"]:checked,
        .role__editor div input[type="checkbox"]:checked,
        .role__guest div input[type="checkbox"]:checked,
        .role__special div input[type="checkbox"]:checked {
            background-color: #28a745;
        }
        
        .role div input[type="checkbox"]:checked:after,
        .role__admin div input[type="checkbox"]:checked:after,
        .role__editor div input[type="checkbox"]:checked:after,
        .role__guest div input[type="checkbox"]:checked:after,
        .role__special div input[type="checkbox"]:checked:after {
            display: block;
        }
        
        .role__buttons button,
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
        /* Jean */
    </style>
@stop

@section('js')
<script type="application/javascript">
    const urlController = '/admin/roles/update';
    const DataContainer = $('#permisionsContainer');

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
    }

    function putByAjax(url = '', values = {}){
        $.ajax({
            url: url,
            type: 'PUT',
            data: {data: JSON.stringify(values), _token: '{{csrf_token()}}'},
            success: function success(data){
                const response = JSON.parse(data)
                console.log(response)
                const checkList = $('[name="'+ response.role+ '"]');
                const checkAll = $('[name="'+ response.role+ '"][value="all"]');
                const checkedElements = $('input[value!="all"][name="'+ response.role+ '"]input:checked') 

                if(response.permission == 'all' && response.isChecked === true) {//check all inputs from a certain role
                    checkList.each((i,element)=>{element.checked = true;})
                }
                else if(response.permission == 'all' && response.isChecked === false){//uncheck all inputs from a speceific role
                    checkList.each((i,element)=>{element.checked = false;})
                }

                if(checkedElements.length >= 4){checkAll.attr('checked','checked')}//check input where value = all from a speceific role
                else if(checkedElements.length < 4){checkAll.attr('checked',false)}//uncheck input where value = all from a speceific role

                let canOrCant = response.isChecked == true ? 'asignado' : 'revocado';
                let html = `
                    <span>Permiso : ${response.permission} ${canOrCant} a ${response.role}</span>
                `;
                $('#infoFeedback').html(html);
                
            },  
            error: function error(err){
                console.error(err);
            }
        });
    }
</script>
@stop