<!doctype html>
<html lang="en">
  <head>
    <title>Home | MangaBookmark</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-dark">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="container">

      <div class="top">
        <nav class="navbar navbar-dark bg-danger">
          <span class="navbar-brand mb-0 h1">MangaBookmark</span>
        </nav>
  
        <h1 class="mt-4 text-white">Selamat Datang <span class="text-warning">{{ Auth::user()->nama }}</span> </h1>
        <hr class="mt-4">
      

      <div class="row" style="width: 60%">
        <div class="col-lg-6 col-6 col-md-6">
          <a class="btn btn-primary p-4 text-white" data-toggle='modal' data-target='#tambahModal'>Tambah</a>
        </div> 
        <div class="col-lg-6 col-6 col-md-6">
          <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger p-4">Logout</button>
          </form> 
        </div>
      </div>

      <hr class="mt-4">


    </div>

    <div class="row">
      @foreach ($post as $item)
        <div class="col-lg-3 col-md-4 col-6 p-4">
          <img src="{{ $item->link_gambar }}" class="card-img-top" alt="" height="280px" width="100px">
          <div class="card">
            <div class="card-body">

              <h5 class="card-tittle">{{ $item->judul }}</h5>

              <div class="row">
                <div class="col-lg-4">
                  <a class="btn btn-success" href="{{ $item->link_manga }}" target="_blank">Go</a>
                </div>
                <div class="col-lg-4">
                  <form action="/delete" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button class="btn btn-danger">Hapus</button>
              </form>
                </div>
                <div class="col-lg-4">
                  <button class="btn btn-warning" data-toggle="modal" data-target="#userEdit-{{ $item->id }}">Edit</button>
            
                </div>
              </div>
              
            </div>
          </div>
        </div>
      @endforeach
    </div>

    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/kebookmark">
          @csrf
          <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" autofocus>
          </div>
          <div class="form-group">
              <label for="link_gambar">Link gambar</label>
              <input type="text" class="form-control" name="link_gambar" >
            </div>
          <div class="form-group">
            <label for="link_manga">Link Manga</label>
            <input type="text" class="form-control" name="link_manga">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

      </div>
    </div>
  </div>
</div>

@foreach ($post as $data)
<div class="modal fade" id="userEdit-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/edit/'. $data->id) }}">
          @csrf
          <input type="hidden" class="form-control" name="user_id" value="{{ $data->id }}">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{ $data->judul }}" autofocus>
          </div>
          <div class="form-group">
              <label for="link_gambar">Link gambar</label>
              <input type="text" class="form-control" name="link_gambar" value="{{ $data->link_gambar }}">
            </div>
          <div class="form-group">
            <label for="link_manga">Link Manga</label>
            <input type="text" class="form-control" name="link_manga" value="{{ $data->link_manga }}">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach

@if(session()->has('add_success'))
    <script>
      swal({
        title: "Berhasil!",
        text: "Data berhasil ditambahkan!",
        icon: "success",
      });
    </script>
    @endif

    
@if(session()->has('dell_success'))
<script>
  swal({
    title: "Berhasil!",
    text: "Data berhasil Dihapus!",
    icon: "success",
  });
</script>
@endif

@if(session()->has('update_success'))
<script>
  swal({
    title: "Berhasil!",
    text: "Data berhasil Diubah!",
    icon: "success",
  });
</script>
@endif
