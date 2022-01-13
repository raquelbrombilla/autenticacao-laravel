<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="css/bootstrapv5.1.3.min.css">
    <link rel="stylesheet" href="css/main.css">
</head> 
<body>
    <div class="container">
        <div class="box">
            <form action="{{ route('password-email') }}" method="POST">
                @csrf
                <div class="col-lg-5 col-md-7 col-sm-9 col-11 margem">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h4 style="text-align: center">Recuperação de senha</h4>
                    <div class="col" style="padding-bottom: 5px;">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Digite seu email" required>
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    
                    <input type="submit" value="Enviar">
                </div>
                
            </form>
        </div>
    </div>
    <div class="bottom-container">
        <div class="col">
            <nav class="btn-sign"><a href="/login" class="link-cad" ><u>Fazer login</u></a></nav>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>