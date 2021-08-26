@extends('adminlte::page')

@section('title', ' Eivissa Slider')

@section('content_header')
    <div class="page-header section__title">
        <h1>Home Slider | <small>Eivissa Decoracio</small></h1>
    </div>
@stop
@section('content')
@if(session()->has('success'))
    <div class="error-notice" id="close-alert">
        <div class="oaerror success">
        <strong>Muy Bien!</strong> - {{session()->get('success')}}
        </div> 
    </div>
@endif
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
    <link rel="stylesheet" href="{{asset('css/alert.css')}}">
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        /* New Slider */
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

        /* Edit Slider */
        .slider__head .head__order {
            width: 5%;
            border-bottom: none;
        }
        
        .slider__head .head__image {
            width: 15%;
            border-bottom: none;
        }
        
        .slider__head .head__title {
            width: 15%;
            border-bottom: none;
        }
        
        .slider__head .head__description {
            width: 20%;
            border-bottom: none;
        }
        
        .slider__head .head__actions {
            width: 10%;
            border-bottom: none;
        }

        .slider__item .item__order {
            vertical-align: middle;
        }
        
        .slider__item .item__image {
            width: 150px;
            vertical-align: middle;
        }
        
        .item__image img {
            width: inherit;
        }
        
        .slider__item .item__title {
            vertical-align: middle;
        }
        
        .slider__item .item__description {
            vertical-align: middle;
        }
        
        .slider__item .item__actions {
            vertical-align: middle;
            padding: 0 .75rem;
        }
        
        .item__actions form {
            display: inline;
        }
    </style>
@stop

@section('js')
<script src="{{asset('js/utils.js')}}"></script>
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
                                $('#ModalTitle_EN').val(data.translation.titulo_en);
                                $('#ModalDescription_EN').val(data.translation.descripcion_en);
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

            FeedBackImg("[data-src-img='1']","[data-old-img='1']")
            FeedBackImg("[data-src-img='2']","[data-old-img='2']")
        })
    </script>
@stop