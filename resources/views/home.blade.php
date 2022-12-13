<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Home</title>
</head>
<body>
    <header>
        <div class="container  d-flex justify-content-end">
            <div class="row">
                <div class="col">
                    <ul class="navbar-nav ml-auto d-flex flex-row">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-3"  >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Gestionale Studio Legale</h1> 
                        <p>
                            Sei un utente registrato? Esegui il Login
                        </p>
                        <p>
                           Non sei registrato? Registrati 
                        </p>
                    </div>
                  
                </div>
            </div>
        </section>
    </main>
</body>
</html>