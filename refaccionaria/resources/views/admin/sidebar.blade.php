<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/Imagenes/Logo.png') }}" class="img-fluid" alt="">
        </div>
        <div class="user">
            <span class="subtitle">Hola:</span>
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->lastnameP }} {{ Auth::user()->lastnameM }}
                <a href="{{ url('/logout') }}" data-toggle="tooltip" data-bs-placement="top" data-bs-title="Salir">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
            <div class="email">
                {{ Auth::user()->email }}
            </div>
        </div>
    </div>
    <div class="main">
        <ul>
            @if (kvfj(Auth::user()->permissions, 'dashboard'))
                <li>
                    <a href="{{ url('/admin') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
                </li>
            @endif
            @if (kvfj(Auth::user()->permissions, 'products'))
                <li>
                    <a href="{{ url('/admin/products') }}"><i class="fa-solid fa-box"></i> Productos</a>
                </li>
            @endif
            @if (kvfj(Auth::user()->permissions, 'types'))
                <li>
                    <a href="{{ url('/admin/types/0') }}"><i class="fa-solid fa-folder"></i> Tipos</a>
                </li>
            @endif
            @if (kvfj(Auth::user()->permissions, 'user'))
                <li>
                    <a href="{{ url('/admin/users/all') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
                </li>
            @endif
        </ul>
    </div>
</div>
