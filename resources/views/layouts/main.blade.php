<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light">
          <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
              <img src="/img/logo.png" alt="Projeto_TCC">
            </a>
            <ul class="navbar-nav">
              @auth
              <li class="nav-item">
                  <a href="/dashboard" class="nav-link">{{Auth::user()->name}}</a>
              </li>
              @endauth
              <li class="nav-item">
                <a href="/dashboard" class="nav-link"></a>
              </li>         
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">Conversas</a>
              </li>
              @auth
                @if (Auth::user()->role_id == 1)
                <li class="nav-item">        
                  <a href="/tags/listagem" class="nav-link">Tags</a>
                </li>
                <li class="nav-item">
                  <a href="/campus/listagem" class="nav-link">Campus</a>
                </li>
                @endif
              @endauth
                @guest
                  <li class="nav-item">
                    <a href="/register" class="nav-link">Cadastrar</a>
                  </li>
                  <li class="nav-item">
                    <a href="/login" class="nav-link">Login</a>
                  </li>
                @endguest
                @auth                
                <li class="nav-item">
                  <a href="/projetos/create" class="nav-link">Tenho um projeto</a>
                </li>
                <li class="nav-item">
                  <form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" 
                      class="nav-link" 
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      Sair
                    </a>
                  </form>
                </li>
                @endauth
            </ul>
          </div>
        </nav>
      </header>
        <main>
          <div class="container-fluid">
            <div class="row">
              @if(session('msg'))
                <p class="msg">{{session('msg')}}</p>
              @endif
                @yield('content')
            </div>
          </div>
        </main>
      <footer>
        <p>Horientando &copy; 2022</p>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    </body>
</html>