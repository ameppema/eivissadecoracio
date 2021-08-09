@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>Administrador de Usuarios | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table users-container">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Nick</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <!-- ID -->
                                        <th style="vertical-align: middle;">1</th>

                                        <!-- Nombre -->
                                        <td style="vertical-align: middle;">Paul Marquez</td>
                                        
                                        <!-- Nick -->
                                        <td style="vertical-align: middle;">Paul</td>
                                        
                                        <!-- Correo -->
                                        <td style="vertical-align: middle;">ameppema@hotmail.com</td>
                                        <!-- Estado -->
                                        <td style="vertical-align: middle;">Activo</td>
                                        
                                        <!-- Acciones -->
                                        <td style="vertical-align: middle; padding: 0 .75rem;">
                                            <button title="Editar" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button title="Eliminar" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <!-- ID -->
                                        <th style="vertical-align: middle;">2</th>

                                        <!-- Nombre -->
                                        <td style="vertical-align: middle;">Juan Perez</td>
                                        
                                        <!-- Nick -->
                                        <td style="vertical-align: middle;">Juan</td>
                                        
                                        <!-- Correo -->
                                        <td style="vertical-align: middle;">juanito_power@gmail.com</td>
                                        <!-- Estado -->
                                        <td style="vertical-align: middle;">Inactivo</td>
                                        
                                        <!-- Acciones -->
                                        <td style="vertical-align: middle; padding: 0 .75rem;">
                                            <button title="Editar" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button title="Eliminar" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <!-- ID -->
                                        <th style="vertical-align: middle;">3</th>

                                        <!-- Nombre -->
                                        <td style="vertical-align: middle;">Andres Iglesias</td>
                                        
                                        <!-- Nick -->
                                        <td style="vertical-align: middle;">Andrew</td>
                                        
                                        <!-- Correo -->
                                        <td style="vertical-align: middle;">andrewmaster@yahoo.com</td>
                                        <!-- Estado -->
                                        <td style="vertical-align: middle;">Activo</td>
                                        
                                        <!-- Acciones -->
                                        <td style="vertical-align: middle; padding: 0 .75rem;">
                                            <button title="Editar" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button title="Eliminar" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <!-- ID -->
                                        <th style="vertical-align: middle;">4</th>

                                        <!-- Nombre -->
                                        <td style="vertical-align: middle;">Maria Santos</td>
                                        
                                        <!-- Nick -->
                                        <td style="vertical-align: middle;">Mary</td>
                                        
                                        <!-- Correo -->
                                        <td style="vertical-align: middle;">mari280585@hotmail.com</td>
                                        <!-- Estado -->
                                        <td style="vertical-align: middle;">Activo</td>
                                        
                                        <!-- Acciones -->
                                        <td style="vertical-align: middle; padding: 0 .75rem;">
                                            <button title="Editar" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button title="Eliminar" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <!-- ID -->
                                        <th style="vertical-align: middle;">5</th>

                                        <!-- Nombre -->
                                        <td style="vertical-align: middle;">Sara Montero</td>
                                        
                                        <!-- Nick -->
                                        <td style="vertical-align: middle;">Sarita</td>
                                        
                                        <!-- Correo -->
                                        <td style="vertical-align: middle;">sara_montero@universidad.com</td>
                                        <!-- Estado -->
                                        <td style="vertical-align: middle;">Inactivo</td>
                                        
                                        <!-- Acciones -->
                                        <td style="vertical-align: middle; padding: 0 .75rem;">
                                            <button title="Editar" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button title="Eliminar" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <!-- ID -->
                                        <th style="vertical-align: middle;">6</th>

                                        <!-- Nombre -->
                                        <td style="vertical-align: middle;">Silvio Paredes</td>
                                        
                                        <!-- Nick -->
                                        <td style="vertical-align: middle;">Silvio</td>
                                        
                                        <!-- Correo -->
                                        <td style="vertical-align: middle;">emprendedor@hotmail.com</td>
                                        <!-- Estado -->
                                        <td style="vertical-align: middle;">Activo</td>
                                        
                                        <!-- Acciones -->
                                        <td style="vertical-align: middle; padding: 0 .75rem;">
                                            <button title="Editar" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button title="Eliminar" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }
    </style>
@stop