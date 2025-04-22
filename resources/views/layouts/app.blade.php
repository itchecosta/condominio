<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Dashboard') - Bosque Lausanne</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  {{-- Exibir navbar e sidebar apenas quando o usuário estiver autenticado e não estiver na tela de login --}}
  @auth
    @unless(Request::is('login') || Request::is('register') || Request::is('password/*'))
      @include('partials.navbar')
      @include('partials.sidebar')
    @endunless
  @endauth

  <div class="content-wrapper mt-4">
    @yield('content')
  </div>

  @auth
    @unless(Request::is('login') || Request::is('register') || Request::is('password/*'))
      <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">Bosque Lausanne</div>
        <strong>&copy; 2025 Condomínio Bosque Lausanne.</strong> Todos os direitos reservados.
      </footer>
    @endunless
  @endauth

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
