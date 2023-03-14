
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Pembayaran Transaksi</title>

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
    <h1 class="h3 mb-2 text-gray-800">Edit Pembayaran Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pembayaran Transaksi</h6>

        </div>
        <div class="card-body">

          <form action="{{ route('update.pembayaran', $transaksi->id )}}" method="POST">
            @csrf

              <div class="mb-3">
                <label for="status" class="form-label">Pembayaran</label>
                <select class="form-select" aria-label="Default select example" name="dibayar">
                    <option selected>{{ $transaksi->dibayar }}</option>
                    <option value="belum_bayar">Belum Bayar</option>
                    <option value="selesai_bayar">Selesai Bayar</option>
                  </select>
              </div>

              <a href="{{ route('transaksi') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

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
