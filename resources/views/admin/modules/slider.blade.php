@extends('adminlte::page')

@section('title', ' Eivissa Slider')

@section('content_header')
    <div class="page-header section__title">
        <h1>Home Slider | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Section new Slider --}}
                <div class="card">
                    <div class="card-body">
                        @include('admin.modules.slider_parts.main_form')
                        {{-- @include('admin.section.slider.slideNew') --}}
                    </div>
                </div>

                {{-- Section edit Slider --}}
                <div class="card">
                    <div class="card-body">
                         @include('admin.modules.slider_parts.main_table')
                         {{-- @include('admin.section.slider.slideEdit') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal edit Slide --}}
@include('admin.modules.slider_parts.update_modal')
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .slider__spanish,
        .slider__english,
        .modal__spanish,
        .modal__english {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            grid-gap: 20px;
            margin-bottom: 30px;
        }
        
        .slider__title,
        .slider__description,
        .modal__title,
        .modal__description {
            display: flex;
            align-items: center;
        }
        
        .title__image,
        .description__image {
            width: 30px;
            height: 21px;
        }
        
        .title__label,
        .description__label {
            margin: 0 10px 0 5px;
        }

        .slider__title > .form-group,
        .slider__description > .form-group,
        .modal__title > .form-group,
        .modal__description > .form-group {
            width: 100%;
            margin-bottom: 0;
        }
    </style>
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
                            if(data){
                                console.log(data);
                                $('#Form-Edit').attr('action', 'slide/' + data.id)
                                $('#ModalTitle_ES').val(data.titulo);
                                $('#ModalDescription_ES').val(data.descripcion);
                                $('#oldImgDesk').attr('src' , '/storage/' + data.imagen);
                                $('#oldImgMovil').attr('src' , '/storage/' + data.imagen_movil);
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