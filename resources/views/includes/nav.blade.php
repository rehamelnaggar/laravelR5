<!-- Start Nav bar -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Clients</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('addClient') }}">Add</a></li>
        <li><a href="{{ route('clients') }}">Clients</a></li>
        <li><a href="{{ route('trashClient') }}">Trash</a></li>
        @yield('menu')
        @stack('submenu')
      </ul>
    </div>
  </nav>
  <!-- End Nav bar -->