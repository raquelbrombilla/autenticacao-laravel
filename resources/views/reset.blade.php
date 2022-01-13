<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alteração de senha</title>
    <link rel="stylesheet" href="../css/bootstrapv5.1.3.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head> 
<body>
    <div class="container">
        <div class="box">
            <form action="{{ route('password-update') }}" method="POST" >
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <div class="col-lg-5 col-md-7 col-sm-9 col-11 margem">
                    @if(session('msg_erro'))
                        <div class="alert alert-danger">{{session('msg_erro')}}</div>
                    @endif
                    <h4 style="text-align: center">Alteração de senha</h4>
                    <div class="col" style="padding-bottom: 5px;">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="Digite um email" value="{{ $email ?? old('email') }}" required>
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="col" style="padding-bottom: 5px;">
                        <label for="senha">Insira a nova senha</label>
                        <input type="password" name="password" placeholder="Digite uma senha" required>
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="col" style="padding-bottom: 5px;">
                        <label for="senha">Confirme a nova senha</label>
                        <input type="password" name="password_confirmation" placeholder="Digite novamente a senha" required>
                        <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
                    </div>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    <div class="bottom-container">
        <div class="col">
            <nav class="btn-sign">Já possui cadastro?  <a href="/login" class="link-cad" ><u>Faça seu login aqui</u></a></nav>
        </div>
      </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>