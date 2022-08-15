<!doctype html>
<html lang="en">
  <head>
    <title>Login | MangaBookmark</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-dark">
    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="container-fuid px-0">
        <div class="card" id="cardAuth">
            <div class="card-header d-flex justify-content-center">
                <h2>Halaman Login</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="/ceklogin">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" autofocus>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <p>Belum punya akun ? <a href="/register">Daftar</a></p>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
            </div>
        </div>
        
    </div>

    @if(session()->has('reg_success'))
    <script>
      swal({
        title: "Selamat!",
        text: "Akun anda berhasil dibuat!",
        icon: "success",
      });
    </script>
    @endif

    @if(session()->has('log_failed'))
    <script>
      swal({
        title: "Login Gagal!",
        text: "Email atau Password salah",
        icon: "error",
      });
    </script>
    @endif

    @if(session()->has('kesalahan'))
    <script>
      swal({
        title: "Kesalahan !",
        text: "Silahkan Login!",
        icon: "warning",
      });
    </script>
    @endif
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>