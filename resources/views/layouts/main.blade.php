<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
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
        <p>Projeto Orientador &copy; 2021</p>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    </body>
</html>