
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi Pelanggan</title>

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
    <h1 class="h3 mb-2 text-gray-800">Registrasi Pelanggan</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
   </div>

<div class="container">
    <div class="row">

        {{-- FORM REGISTRASI --}}
        <div class="col-md-4">

                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Register Pelanggan</h6>
                    </div>
                    <div class="card-body">

                      <form action="{{ route('insert.register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            @error('nama')
                             <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>

                        <div class="mb-4">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            @error('alamat')
                             <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>

                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                          </div>

                          <div class="mb-3">
                            <label for="notlp" class="form-label">No Telpon</label>
                            <input type="number" class="form-control" id="notelp" name="no_tlp">
                            @error('no_tlp')
                             <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Save</button>
                      </form>

                    </div>
                </div>

        </div>


             {{-- TABEL --}}
             <div class="col-md-8">

                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabel Pelanggan</h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telp</th>
                                    </tr>
                                </thead>

                                @php
                                    $no = 1
                                @endphp

                                 @foreach ($pelanggan as $p)

                                <tbody>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ $p->no_tlp }}</td>
                                    </tr>
                                </tbody>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

             </div>

        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->

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