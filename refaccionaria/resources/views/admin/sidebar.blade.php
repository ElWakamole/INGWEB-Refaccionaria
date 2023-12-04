<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/Imagenes/Logo.png') }}" class="img-fluid" alt="">
        </div>
        <div class="user">
            <span class="subtitle">Hola:</span>
            <div class="name">
                {{ Auth::user()-> name }} {{ Auth::user()-> lastnameP }} {{ Auth::user()-> lastnameM }}
                <a href="{{ url('/logout') }}" data-toggle="tooltip" data-bs-placement="top" data-bs-title="Salir">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
            <div class="email">
                {{ Auth::user()-> email }}
            </div>
        </div>
    </div>
    <div class="main">
        <ul>
            <li>
                <a href="{{ url('/admin') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('/admin/products') }}"><i class="fa-solid fa-box"></i> Productos</a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
            </li>
        </ul>
    </div>
</div>