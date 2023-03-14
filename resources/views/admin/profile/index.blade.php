<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<body style="background-color: rgb(62, 97, 211)">

<div class="container px-3 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Profile</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            @if( $user->photo)
                                <img src="{{ asset('image/'.$user->photo)}}" class="img-thumbnail rounded mx-auto d-block">
                            @endif

                        </div>
                        <div class="col-md-8">
                            <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="nama" class="col-md-4 col-form-label text-md-end">Nama</label>
                                    <div class="col-md-6">
                                        <input type="#" class="form-control" value="{{ $user->nama }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
                                    <div class="col-md-6">
                                        <input type="#" class="form-control" value="{{ old('username', $user->username) }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">Jabatan</label>
                                    <div class="col-md-6">
                                        <input type="#" class="form-control" value="{{ old('role', $user->role) }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="change-foto" class="col-md-4 col-form-label text-md-end">Ubah Foto</label>
                                    <div class="col-md-6">
                                        <input id="photo" type="file" class="form-control" name="photo">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
</body>
</html>



