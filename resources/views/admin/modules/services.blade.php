@extends('adminlte::page')

@section('title', ' Eivissa Services')

@section('content_header')
    <div class="page-header">
    <h1>Eivisa | <small>Gestor de Servicios</small></h1>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            {{-- Start New Slider Item Form -  --}}
                <div class="card">
                    <div class="card-body">

                    @include('admin.modules._services.form')

                    </div>
                </div>
            {{-- End New Slider Item Form  --}}

            {{-- Start SlideShow -  --}}
                <div class="card">
                    <div class="card-body">
                        
                         <p class="h1">Seccion 2</p>
                        
                    </div>
                </div>
            {{-- End SlideShow --}}
            </div>
        </div>
    </div>
</section>

@stop

@section('js')
    <script type="application/javascript">
        var alertList = document.querySelectorAll('.alert')
            alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
            })
    </script>
@stop
