<div class="col-md-3 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">
                <i class="fa-solid fa-house"></i> Modulo Dashboard
            </h2>
        </div>
        <div class="inside">
            <div class="form-check">
                <input type="checkbox" name="dashboard" value="true" id=""
                @if (kvfj($user->getPermissions(),'dashboard'))
                    @checked(true)
                @endif><label for="dashboard">Ver el dashboard</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="dashboardstd" value="true" id=""
                @if (kvfj($user->getPermissions(),'dashboardstd'))
                    @checked(true)
                @endif><label for="dashboardstd">Ver estadisticas</label>
            </div>
        </div>
    </div>
</div>