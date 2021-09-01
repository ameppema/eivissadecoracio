<!-- Modal -->
<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Registrar Nuevo Usuario: <strong id="userNamePlaceHolder"></strong></h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- Modal New User --}}
            <div class="modal-body">
                <form action="{{route('admin.users.create')}}" class="mt-4 modal__container" id="modalUserUpdate" method="POST">
                    @csrf



                    {{-- Assign Role & Status --}}
                    <div class="form-row mb-4">
                        <div class="col-4 form-group">
                            <label for="name">Nombre</label>
                            <input name="name" type="text" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                        </div>
                        <div class="col form-group">
                            <label for="nickname">Nick Name</label>
                            <input name="nickname" type="text" class="form-control" placeholder="Nick Name" value="{{old('nickname')}}">
                        </div>
                        <div class="col form-group">
                            <label for="email">Correo</label>
                            <input name="email" type="email" class="form-control" placeholder="Correo o Email" value="{{old('email')}}">
                        </div>
                    </div>
                    {{-- Assign Role & Status --}}
                    <div class="form-row mb-4">
                        <div class="form-group col-6">
                            <label for="role">Role de Usuario</label>
                            <select class="form-control" name="role">
                                <option value="" disabled selected>--- Asignar un Rol ---</option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                                <option value="Guest">Guest</option>
                                <option value="Especial">Especial</option>
                            </select>
                        </div>

                        {{-- User Status --}}
                        <div class="form-group col-6">
                            <label for="status">Estado del usuario</label>
                            <select class="form-control" name="status">
                                <option value="null" disabled selected>--- Seleccionar Status de Usuario ---</option>
                                <option value="1">Activo</option>
                                <option value="0">Incativo</option>
                            </select>
                        </div>
                    </div>
                    {{-- User Password --}}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="password">Contraseña</label>
                            <input name="password" type="password" class="form-control" id="pass">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input name="password_confirmation" type="password" class="form-control" id="pass_confirm">
                        </div>
                    </div>

                    <div class="modal__buttons">
                        <input class="btn btn-success modal__button" type="submit">
                        <button class="btn btn-danger modal__button" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->