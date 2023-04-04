
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Member Data</title>

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

{{-- Alert --}}
  @include('sweetalert::alert')
{{-- End Alert --}}


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Member Data</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Of Member Data</h6>

            {{-- FORM SEARCH --}}
            <form action="/pelanggan" method="GET" class="d-none d-sm-inline-block  align-items-center">
            <div class="input-group">
                <input type="search" class="form-control bg-light border-0 small" placeholder="Search for..." name="search" autofocus>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
           </form>
         {{-- END SEARCH --}}

            <a href="/tambahdata" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $no = 1
                        @endphp

                        @foreach ($pelanggan as $row)

                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>{{ $row->no_tlp }}</td>
                            <td>
                                <a href="/ubahpelanggan/{{ $row->id }}" class="btn btn-success">
                                    <span class="text">Edit</span>
                                </a>

                                @if (count($row->transaksis) < 1)
                                <a href="/hapuspelanggan/{{ $row->id }}" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete?')">
                                    <span class="text">Delete</span>
                                </a>
                                @endif
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
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
