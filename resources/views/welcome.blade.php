<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Welcome</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrapv5.1.3.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/features.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end d-flex" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                  <li class="nav-item active">
                    <a class="nav-link" href="/logout">Sair</a>
                  </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container pt-5" >
        <b>Logado como:</b> {{ Auth::user()->email}}
    </div>

    <script src="js/bootstrap.bundle.min.js"></script> 
  </body>
</html>
