<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img alt="eldercare" class="admin-logo-nav" src="{{ asset('images/030-jigglypuff.png') }}">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('users.create') }}">Inicio</a></li>
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li><a href="#">Articulos</a></li>
        <li><a href="#">Imagenes</a></li>
        <li><a href="#">Tags</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ejemplo</a></li>
            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Imagenes</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Tags</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>