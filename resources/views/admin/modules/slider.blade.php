@extends('adminlte::page')

@section('title', ' Eivissa Slider')

@section('content_header')
    <div class="page-header">
    <h1>Panel de Administración Eivisa | <small>Gestor de Slider</small></h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            {{-- Start New Slider Item Form - main_form  --}}
                <div class="card">
                    <div class="card-body">

                        @include('admin.modules.slider_parts.main_form')

                    </div>
                </div>
            {{-- End New Slider Item Form  --}}

            {{-- Start SlideShow - main_table --}}
                <div class="card">
                    <div class="card-body">
                        
                         @include('admin.modules.slider_parts.main_table')
                        
                    </div>
                </div>
            {{-- End SlideShow --}}
            </div>
        </div>
    </div>
</section>

{{-- Modal para editar slide - update_modal --}}
@include('admin.modules.slider_parts.update_modal')
@stop

@section('js')
<script type="application/javascript">

        $(document).ready(() => {
            // Obteniendo datos a actualizar
            $('#table-edit').on('click', function(e) {
                let _target = e.target;

                if(_target.classList.contains('btn-warning') | _target.classList.contains('fa-pencil-alt'))
                {
                    let SlideId = _target.getAttribute('data-slideid')
                    // Peticion Asincrona para actualizar elementos
                    $.ajax({
                        url : 'slide/'+SlideId+'/edit',
                        data: {},
                        type: 'GET',
                        success: function(data){
                            if(data){//console.log(data[0]); //Debug

                                $('#Form-Edit').attr('action', 'slide/' + data[0].id)

                                $('#modal-titulo').val(data[0].titulo);
                                $('#modal-desc').val(data[0].descripcion);
                                $('#oldImgDesk').attr('src' , '/storage/' + data[0].imagen);
                                $('#oldImgMovil').attr('src' , '/storage/' + data[0].imagen_movil);
                            }
                        },
                        error: function(error){
                            console.log({error}); console.log({'error msg': error.responseJSON.message});
                        }
                    });
                }
            });

            $('#EnviarModalEditar').on('click', function(){
                $('#Form-Edit').submit();
            })
        })
</script>
@stop