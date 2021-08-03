@extends('adminlte::page')

@section('title', ' Eivissa')

@section('content_header')
    <div class="page-header section__title">
        <h1>Admin Panel | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="card">
            <p class="card__intro">
                Aquí puedes tener acceso para modificar todas las secciones de la web
            </p>

            <div class="container__card">
                <a class="card__items" href="admin/category_menu">
                    <i class="card__logo fas fa-list-ul"></i>
                    <p class="card__text">Menu</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/slide">
                    <i class="card__logo far fa-images"></i>
                    <p class="card__text">Slider</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/module/historia/6">
                    <i class="card__logo fas fa-landmark"></i>
                    <p class="card__text">Historia</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/module/obras/1">
                    <i class="card__logo fas fa-hard-hat"></i>
                    <p class="card__text">Obras</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/module/rehabilitaciones/2">
                    <i class="card__logo fas fa-tools"></i>
                    <p class="card__text">Rehabilitaciones</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/module/interiores/3">
                    <i class="card__logo fas fa-couch"></i>
                    <p class="card__text">Interiores</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/module/cocinas/4">
                    <i class="card__logo fas fa-utensils"></i>
                    <p class="card__text">Cocinas</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/module/parquets/5">
                    <i class="card__logo fas fa-briefcase"></i>
                    <p class="card__text">Parquets</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="admin/module/partners">
                    <i class="card__logo fas fa-handshake"></i>
                    <p class="card__text">Partners</p>
                    <button class="card__button">Click</button>
                </a>
                
                <a class="card__items" href="#">
                    <i class="card__logo fas fa-user"></i>
                    <p class="card__text">Users</p>
                    <button class="card__button">Click</button>
                </a>
            </div>
        </div>
    </section>
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }
        
        .card {
            justify-content: center;
            align-items: center;
        }
        
        .card__intro {
            width: 500px;
            margin: 40px 0 10px;
            text-align: center;
            font-size: 25px;
            line-height: 30px;
        }

        .container__card {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .card__items {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            width: 200px;
            height: 200px;
            margin: 20px;
            padding: 15px 0;
            border-radius: 20px;
            border: 2px solid lightgrey;
        }
        
        .card__logo {
            color: #212529;
            font-size: 40px;
        }
        
        .card__text {
            width: 90%;
            margin: 0;
            color: #212529;
            font-size: 18px;
            text-align: center;
        }
        
        .card__button {
            width: 120px;
            height: 40px;
            border-radius: 10px;
            border: none;
            color: white;
            background-color: #212529;
        }

        .card__items:hover {
            color: #007bff;
            border: 2px solid #007bff;
            box-shadow: 6px 5px 5px #007bff1a;
        }

        .card__items:hover .card__logo  {
            color: #007bff;
        }

        .card__items:hover .card__button  {
            color: white;
            background-color: #007bff;
        }
    </style>
@stop