<!-- Modal -->
<div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Actualizar imagen de Galería</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {{-- Modal add new Image --}}
                <form class="mt-4 modal__container" id="modalFormUpdate" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    {{-- Modal Title & Description in Spanish --}}
                    <div class="modal__spanish">
                        <div class="modal__title">
                            <label class="title__label" for="menu_nombre-es">Nombre Item Navegación Es</label>
                            <input type="text" class="form-control"  name="menu_nombre-es" id="menu_nombre_es" placeholder="Nombre enlace Español">
                        </div>
                    </div>
                    
                    {{-- Modal Title & Description in English --}}
                    <div class="modal__english">
                        <div class="modal__title">
                            <label class="title__label" for="menu_nombre-en">Nombre Item Navegación En</label>
                            <input type="text" class="form-control" name="menu_nombre-en" id="menu_nombre_en" placeholder="Título enlace Ingles"/>
                        </div>
                    </div>

                    <button class="btn btn-success modal__button" type="submit">Actualizar</button>
                    <button class="btn btn-danger modal__button" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->