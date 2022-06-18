<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Register</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Register</h4>
                <hr>
                <!-- Conecta submit do form, com a ação da api, execulta a rota, enviando os parâmetros -->
                <form action="{{route('register-user')}}" method="post" class="">

                <!-- Teste se a Session enviou success como back, quando executado a rota -->
                <!-- Se enviou, então iremos retonar um alerta que deu certo, usando bootstrap e passando
                a messagem de sucesso -->
                <!-- Se não deu certo, então retornaramos um alerto negativo, usando bootstrap e psasando a mensagem de fail -->
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>     
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf 
    
                
                    <!-- Name -->
                    
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control"type="text" name="name" placeholder="Enter Name">
                    </div>
                    <span class="text-danger">@error('name') {{$message}}@enderror</span>
                    
                    <!-- Email -->
                    
                    <div class="form-group">
                        <label for="Name">Email</label>
                        <input class="form-control"type="text" name="email" id="" placeholder="Enter Email">
                    </div>
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="password" name="password" placeholder="Enter Password">
                    </div>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    <br>
                    <!-- Submit -->
                    <button type="submit" class="btn btn- btn-primary">Register</button>
                </form>
                <a href="/login">Already Have Accout ?</a>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
