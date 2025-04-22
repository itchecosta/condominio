<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('providers.index') }}" class="brand-link">
    <img src="{{ asset('images/favicon.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Bosque Lausanne</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-header">MÓDULOS</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-truck"></i>
            <p>
              Fornecedores
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('providers.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
              </a>
            </li>
            @if(auth()->check() && auth()->user()->role === 'admin')
            <li class="nav-item">
              <a href="{{ route('providers.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Adicionar</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Agendamentos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('appointment-groups.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
              </a>
            </li>
            @if(auth()->check() && auth()->user()->role === 'admin')
            <li class="nav-item">
              <a href="{{ route('appointment-groups.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Adicionar</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>