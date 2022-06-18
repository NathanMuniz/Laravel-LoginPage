<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Login Page</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Log In</h4>
                <hr>
                <form action="{{route('login-user')}}" method='post'>
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>     
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <!-- Email -->
                    <div class="form-group">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                        <label for="Name">Email</label>
                        <input class="form-control"type="text" name="email" id="" placeholder="Enter Email" value="{{old('email')}}">
                    </div>
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>

                    <!-- Password -->
                    <div class="form-group">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        <label for="Password">Name</label>
                        <input class="form-control"type="password" name="password" placeholder="Enter Password">
                    </div>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        <br>
                    <!-- Submit -->
                    <button type="submit" class="btn btn- btn-primary">Login</button>
                </form>

                <a href="/register">Dont Have Accout ?</a>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
