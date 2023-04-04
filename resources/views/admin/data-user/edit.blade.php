
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit User Data</title>

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
    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User Data</h6>

        </div>
        <div class="card-body">

          <form action="{{ route('update.user', $user->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Name</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                @error('nama')
                 <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

            <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                @error('username')
                 <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" aria-label="Default select example" name="role">
                    <option selected>{{ $user->role }}</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Cashier</option>
                    <option value="owner">Owner</option>
                  </select>
              </div>

              <a href="{{ route('user') }}" class="btn btn-secondary">Back</a>
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
