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
                <div class="card">
                    <div class="card-body">
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-adminlte-input name="titulo" label="Titulo" placeholder="Titulo"
                                    fgroup-class="col-4" disable-feedback/>
    
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="..."
                                    fgroup-class="col-6" disable-feedback/>
                                
                            </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="imagen-slide" name="imagen">
                                </div>

                                <br>

                                <x-adminlte-button type="submit" label="Agregar al Slide" theme="primary"/>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop