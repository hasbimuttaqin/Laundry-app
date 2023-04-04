<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report</title>

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
    <h1 class="h3 mb-2 text-gray-800">Report</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Print Report</h6>

        </div>
        <div class="card-body">
            <form action="{{ route('print.laporan') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="tglawal" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="tgl" name="tgl">
                  </div>

                  <div class="mb-4">
                    <label for="tglakhir" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="batas_waktu" name="batas_waktu">
                  </div>

                  <button type="submit" class="btn btn-primary"> <i class="fas fa-fw fa-print"></i> Print Report</button>

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
