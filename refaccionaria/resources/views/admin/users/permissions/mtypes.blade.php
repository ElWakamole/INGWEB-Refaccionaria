<div class="col-md-3 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">
                <i class="fa-solid fa-folder"></i> Modulo Tipos
            </h2>
        </div>
        <div class="inside">
            <div class="form-check">
                <input type="checkbox" name="types" value="true" id=""
                @if (kvfj($user->getPermissions(),'types'))
                    @checked(true)
                @endif><label for="types">Ver los tipos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="typesadd" value="true" id=""
                @if (kvfj($user->getPermissions(),'typesadd'))
                    @checked(true)
                @endif><label for="typesadd">Agregar tipos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="typesedit" value="true" id=""
                @if (kvfj($user->getPermissions(),'typesedit'))
                    @checked(true)
                @endif><label for="typesedit">Editar tipos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="typesdelete" value="true" id=""
                @if (kvfj($user->getPermissions(),'typesdelete'))
                    @checked(true)
                @endif><label for="typesdelete">Eliminar tipos</label>
            </div>
        </div>
    </div>
</div>