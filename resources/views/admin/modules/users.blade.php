@extends('adminlte::page')

@section('title', 'Users Page')

@section('content_header')
    <div class="page-header section__title">
        <h1>@role('Admin') Administrador @else Editor @endrole de Usuarios | <small>Eivissa Decoracio</small></h1>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table class="table users-container">
                    <thead class="users__title">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Nickname</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Sesión</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="users__items">
                        <tr>
                            <!-- ID -->
                            <td>1</td>

                            <!-- Nombre -->
                            <td>Paul Marquez</td>
                            
                            <!-- Nick -->
                            <td>Paul</td>
                            
                            <!-- Correo -->
                            <td>ameppema@hotmail.com</td>
                            
                            <!-- Rol -->
                            <td>Administrador</td>

                            <!-- Sesión -->
                            <td>27/08/2021</td>

                            <!-- Estado -->
                            <td>Activo</td>
                            
                            <!-- Acciones -->
                            <td class="item__actions">
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
                            <td>2</td>

                            <!-- Nombre -->
                            <td>Juan Perez</td>
                            
                            <!-- Nick -->
                            <td>Juan</td>
                            
                            <!-- Correo -->
                            <td>juanito_power@gmail.com</td>

                            <!-- Rol -->
                            <td>Editor</td>

                            <!-- Sesión -->
                            <td>27/08/2021</td>

                            <!-- Estado -->
                            <td>Inactivo</td>
                            
                            <!-- Acciones -->
                            <td class="item__actions">
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
                            <td>3</td>

                            <!-- Nombre -->
                            <td>Andres Iglesias</td>
                            
                            <!-- Nick -->
                            <td>Andrew</td>
                            
                            <!-- Correo -->
                            <td>andrewmaster@yahoo.com</td>

                            <!-- Rol -->
                            <td>Editor</td>

                            <!-- Sesión -->
                            <td>27/08/2021</td>

                            <!-- Estado -->
                            <td>Activo</td>
                            
                            <!-- Acciones -->
                            <td class="item__actions">
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
                            <td>4</td>

                            <!-- Nombre -->
                            <td>Maria Santos</td>
                            
                            <!-- Nick -->
                            <td>Mary</td>
                            
                            <!-- Correo -->
                            <td>mari280585@hotmail.com</td>

                            <!-- Rol -->
                            <td>Editor</td>

                            <!-- Sesión -->
                            <td>27/08/2021</td>

                            <!-- Estado -->
                            <td>Activo</td>
                            
                            <!-- Acciones -->
                            <td class="item__actions">
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
                            <td>5</td>

                            <!-- Nombre -->
                            <td>Sara Montero</td>
                            
                            <!-- Nick -->
                            <td>Sarita</td>
                            
                            <!-- Correo -->
                            <td>sara_montero@universidad.com</td>

                            <!-- Rol -->
                            <td>Editor</td>

                            <!-- Sesión -->
                            <td>27/08/2021</td>

                            <!-- Estado -->
                            <td>Inactivo</td>
                            
                            <!-- Acciones -->
                            <td class="item__actions">
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
                            <td>6</td>

                            <!-- Nombre -->
                            <td>Silvio Paredes</td>
                            
                            <!-- Nick -->
                            <td>Silvio</td>
                            
                            <!-- Correo -->
                            <td>emprendedor@hotmail.com</td>

                            <!-- Rol -->
                            <td>Administrador</td>

                            <!-- Sesión -->
                            <td>27/08/2021</td>

                            <!-- Estado -->
                            <td>Activo</td>
                            
                            <!-- Acciones -->
                            <td class="item__actions">
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
    </section>
@stop

@section('css')
    <style>
        .section__title {
            margin-left: 7.5px;
        }

        .users__items tr td {
            vertical-align: middle;
        }

        .item__actions {
            padding: 0 .75rem;
        }
    </style>
@stop