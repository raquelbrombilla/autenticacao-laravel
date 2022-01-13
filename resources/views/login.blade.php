<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrapv5.1.3.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <link rel="stylesheet" href="css/main.css">
</head> 
<body>
    <div class="container">
        <div class="box">
            <form action="{{ route('auth') }}" method="POST">
                @csrf
                <div class="col-lg-5 col-md-7 col-sm-9 col-11 margem">
                    @if(session('msg'))
                        <div class="alert alert-danger">{{session('msg')}}</div>
                    @endif
                    @if(session('msg_success'))
                        <div class="alert alert-success">{{session('msg_success')}}</div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 style="text-align: center">Login</h4>
                
                    <div class="col">
                        <a href="{{ route('facebook.login') }}" class="fb btn">
                            <i class="fa fa-facebook fa-fw"></i> Entrar com Facebook
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('google.login') }}" class="google btn">
                            <i class="fa fa-google fa-fw"></i> Entrar com Google+
                        </a>
                    </div>
                  
                    <div class="hide-md-lg">
                        <p style="text-align: center">Ou faça o login manualmente:</p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                        </div>
                    @endif
                    <div class="col">
                        <input type="email"
                            @if(Cookie::has('email')) 
                                value="{{ Cookie::get('email') }}" 
                            @endif
                        name="email" placeholder="Email">
                    </div>
                    <div class="col">
                        <input type="password" 
                        @if (Cookie::has('password'))
                            value="{{ Cookie::get('password') }}" 
                        @endif
                        name="password" placeholder="Senha">
                    </div>
                    <input type="submit" value="Login">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 justify-content-sm-center justify-content-md-start justify-content-lg-start justify-content-center  d-flex">
                            <label>
                                <input type="checkbox" 
                                @if (Cookie::has('email'))
                                    checked
                                @endif
                                value="remember" name="remember" id="remember" style="width: auto!important;"> Lembre-se de mim
                            </label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 justify-content-sm-center justify-content-md-end justify-content-lg-end justify-content-center d-flex">
                            <a href="/forgot-password" class="link-cad"><nav class="justify-content-end d-flex">
                                Esqueceu sua senha? 
                            </nav></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bottom-container">
        <div class="col">
            <nav class="btn-sign">Não possui cadastro?  <a href="cadastro" class="link-cad">Cadastre-se aqui</a></nav>
        </div>
      </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>