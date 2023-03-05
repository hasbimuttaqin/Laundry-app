
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Data Paket</title>

    @include('template.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
          @include('template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                  @include('template.navbar')
                <!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Paket</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Paket</h6>

        </div>
        <div class="card-body">

          <form action="{{ route('store.paket') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Outlet</label>
                <select class="form-select" aria-label="Default select example" name="id_outlet">
                    <option selected>Pilih Outlet</option>
                    @foreach ($outlet as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_outlet}}</option>
                    @endforeach
                  </select>
              </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Nama Paket</label>
                <input type="text" class="form-control" id="alamat" name="nama_paket">
                @error('nama_paket')
                 <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

            <div class="mb-3">
                <label for="jeniskelamin" class="form-label">Jenis Paket</label>
                <select class="form-select" aria-label="Default select example" name="jenis">
                    <option selected>Pilih Jenis Paket</option>
                    <option value="kiloan">kiloan</option>
                    <option value="selimut">selimut</option>
                    <option value="bed_cover">bed_cover</option>
                    <option value="kaos">kaos</option>
                  </select>
              </div>

              <div class="mb-3">
                <label for="notlp" class="form-label">Harga</label>
                <input type="number" class="form-control" id="notelp" name="harga">
                @error('harga')
                 <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <a href="{{ route('paket') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('template.logoutmodal')

    {{-- JavaScript --}}
      @include('template.script')
    {{-- End-JavaScript --}}

</body>

</html>
