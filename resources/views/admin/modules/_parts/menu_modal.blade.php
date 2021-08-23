<!-- Modal -->
<div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Actualizar enlace de Menú</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {{-- Modal add new Image --}}
                <form class="modal__container" id="modalFormUpdate" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="modal__inputs">
                        {{-- Modal Title & Description in Spanish --}}
                        <div class="input__spanish">
                            <img class="input__img" src="/images/navbar/lang_es.png" alt="Eivissa Decoracio Spanish">
                            <label class="input__label" for="menu_nombre-es">Menú Link ES</label>
                            <input class="input__text" type="text" name="menu_nombre-es" id="menu_nombre_es" placeholder="Nombre enlace Español">
                        </div>
                        
                        {{-- Modal Title & Description in English --}}
                        <div class="input__english">
                            <img class="input__img" src="/images/navbar/lang_en.png" alt="Eivissa Decoracio English">
                            <label class="input__label" for="menu_nombre-en">Menú Link EN</label>
                            <input class="input__text" type="text" name="menu_nombre-en" id="menu_nombre_en" placeholder="Título enlace Ingles"/>
                        </div>
                    </div>

                    <div class="modal__buttons">
                        <button class="btn btn-success modal__button" type="submit">Actualizar</button>
                        <button class="btn btn-danger modal__button" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->