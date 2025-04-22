<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('providers.index') }}" class="nav-link">Início</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ms-auto">
    @auth
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user mr-1"></i> {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item text-danger"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Sair
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Entrar</a>
      </li>
    @endauth
  </ul>
</nav>