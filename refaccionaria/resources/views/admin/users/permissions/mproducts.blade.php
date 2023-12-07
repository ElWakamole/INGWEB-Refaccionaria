<div class="col-md-3 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title">
                <i class="fa-solid fa-box"></i> Modulo Productos
            </h2>
        </div>
        <div class="inside">
            <div class="form-check">
                <input type="checkbox" name="products" value="true" id=""
                @if (kvfj($user->getPermissions(),'products'))
                    @checked(true)
                @endif><label for="products">Ver los productos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="productsadd" value="true" id=""
                @if (kvfj($user->getPermissions(),'productsadd'))
                    @checked(true)
                @endif><label for="productsadd">Agregar productos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="productsedit" value="true" id=""
                @if (kvfj($user->getPermissions(),'productsedit'))
                    @checked(true)
                @endif><label for="productsedit">Editar productos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="productsdelete" value="true" id=""
                @if (kvfj($user->getPermissions(),'productsdelete'))
                    @checked(true)
                @endif><label for="productsdelete">Eliminar productos</label>
            </div>
        </div>
    </div>
</div>