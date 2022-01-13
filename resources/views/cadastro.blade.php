<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrapv5.1.3.min.css">
    <link rel="stylesheet" href="css/main.css">
</head> 
<body>
    <div class="container">
        <div class="box">
            <form action="{{ route('cadastrar') }}" method="POST">
                @csrf
                <div class="col-lg-5 col-md-7 col-sm-9 col-11 margem">
                    @if(session('msg_erro'))
                        <div class="alert alert-danger">{{session('msg_erro')}}</div>
                    @endif
                    <h4 style="text-align: center">Cadastro</h4>
                    <div class="col" style="padding-bottom: 5px;">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="Digite um email" required>
                    </div>
                    <div class="col" style="padding-bottom: 5px;">
                        <label for="senha">Senha</label>
                        <input type="password" name="password" placeholder="Dige uma senha" required>
                    </div>
                    <input type="submit" value="Cadastrar">
                </div>
                
            </form>
        </div>
    </div>
    <div class="bottom-container">
        <div class="col">
            <nav class="btn-sign">Já possui cadastro?  <a href="/login" class="link-cad" ><u>Faça seu login aqui</u></a></nav>
        </div>
      </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>