<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Actualizar Informacion del Usuario: <strong id="userNamePlaceHolder"></strong></h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- Modal Update User Info --}}
            <div class="modal-body">
                <form class="mt-4 modal__container" id="modalUserUpdate" method="POST">
                    @method('put')
                    @csrf

                    <div class="form-row mb-4">
                        {{-- Update Role --}}
                        <div class="form-group col-6">
                            <select class="form-control" name="role">
                                <option value="" disabled selected>--- Selecciona un nuevo Rol ---</option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                                <option value="Editor">Editor</option>
                                <option value="Especial">Especial</option>
                            </select>
                        </div>

                        {{-- User Status --}}
                        <div class="form-group col-6">
                            <select class="form-control" name="status">
                                <option value="null" disabled selected>--- Cambiar estatus de usuario ---</option>
                                <option value="1">Activo</option>
                                <option value="0">Incativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal__buttons">
                        <button class="btn btn-success modal__button" type="submit">Guardar</button>
                        <button class="btn btn-danger modal__button" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->