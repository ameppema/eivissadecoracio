@extends('adminlte::page')

@section('title', ' Eivissa')

@section('content_header')
    <div class="page-header" style="margin-left: 7.5px;">
        <h1>Control Panel | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <p>
                            Aquí puedes tener acceso para modificar todas las secciones de la web
                        </p>

                        <div class="card-body">
                            <a href="#">
                                <div class="card_item">
                                    <i class="fas fa-list-ul"></i>
                                    <p>Menu</p>
                                    <button>Click</button>
                                </div>
                            </a>
                            
                            <div class="card_item">
                                <i class="far fa-images"></i>
                                <p>Slider</p>
                                <button>Click</button>
                            </div>
                            
                            <div class="card_item">
                                <i class="fas fa-landmark"></i>
                                <p>Historia</p>
                                <button>Click</button>
                            </div>
                            
                            <div class="card_item">
                                <i class="fas fa-hard-hat"></i>
                                <p>Obras</p>
                                <button>Click</button>
                            </div>
                            
                            <div class="card_item">
                                <i class="fas fa-toolbox"></i>
                                <p>Rehabilitaciones</p>
                                <button>Click</button>
                            </div>
                            
                            <div class="card_item">
                                <i class="fas fa-house-user"></i>
                                <p>Interiores</p>
                                <button>Click</button>
                            </div>
                            
                            <div class="card_item">
                                <i class="fas fa-utensils"></i>
                                <p>Cocinas</p>
                                <button>Click</button>
                            </div>
                            
                            <div class="card_item">
                                <i class="fas fa-briefcase"></i>
                                <p>Parquets</p>
                                <button>Click</button>
                            </div>
                            
                            <div class="card_item">
                                <i class="fas fa-handshake"></i>
                                <p>Partners</p>
                                <button>Click</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <style>
        .card {
            justify-content: center;
            align-items: center;
        }
        
        .card p {
            width: 500px;
            margin: 40px 0 10px;
            text-align: center;
            font-size: 25px;
            line-height: 30px;
        }

        .card-body {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .card_item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 200px;
            height: 200px;
            margin: 20px;
            border: 2px solid lightgrey;
            border-radius: 20px;
        }
        
        .card_item:hover {
            color: blue;
            border: 2px solid blue;
        }
        
        .card_item i {
            font-size: 40px;
            margin-bottom: 10px;
        }
        
        .card_item p {
            margin: 10px 0;
            color: #212529;
            font-size: 18px;
        }
        
        .card_item button {
            width: 120px;
            height: 40px;
            border-radius: 10px;
            border: none;
            color: white;
            background-color: #007bff;
        }
        
        .card_item button:hover {
            color: white;
            background-color: blue;
        }
    </style>
@stop