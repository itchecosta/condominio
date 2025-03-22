<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('providers.index') }}">Bosque Lausanne</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item">
              <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Sair
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Entrar</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  