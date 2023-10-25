<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Signin Template · Bootstrap v5.0</title>
  <link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <link href="{{ asset('signin.css') }}" rel="stylesheet">
  <link href="{{ asset('custom.css') }}" rel="stylesheet">
  <link href="{{ asset('style.css') }}" rel="stylesheet">

</head>

<body class="text-center">

  <main class="form-signin">
    <form method="post" action="{{ route('xl-dang-nhap') }}">
      @csrf
      <img class="mb-4" src="logo-login.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="text" class="form-control" name="ten_dang_nhap" id="floatingInput" placeholder="User name">
        <label for="floatingInput">User name</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="mat_khau" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
  </main>

</body>

</html>