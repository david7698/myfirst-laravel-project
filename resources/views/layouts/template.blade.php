<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <body>
    <ul class="nav bg-dark ">
  <li class="nav-item">
    <a class="nav-link active text-light" aria-current="page" href="primotest">home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="/book/create">crea</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="/biblioteca">libri</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="/contattaci">contattaci</a>
  </li>
</ul>
        <H2 class="text-center">@yield('title')</H2>
 
        <div class="container" style="border: 1px black solid">
            @yield('content')
        </div>
    </body>
    @stack('scripts')
</html>