<div class="col-md-3 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">
                <i class="fa-solid fa-users"></i> Modulo Usuarios
            </h2>
        </div>
        <div class="inside">
            <div class="form-check">
                <input type="checkbox" name="user" value="true" id=""
                @if (kvfj($user->getPermissions(),'user'))
                    @checked(true)
                @endif><label for="user">Ver los usuarios</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="userpermissions" value="true" id=""
                @if (kvfj($user->getPermissions(),'userpermissions'))
                    @checked(true)
                @endif><label for="userpermissions">Editar permisos de usuarios</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="useredit" value="true" id=""
                @if (kvfj($user->getPermissions(),'useredit'))
                    @checked(true)
                @endif><label for="useredit">Editar usuarios</label>
            </div>
        </div>
    </div>
</div>