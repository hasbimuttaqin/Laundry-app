
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Transaction</title>

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
    <h1 class="h3 mb-2 text-gray-800">Add Transaction</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Transaction Data</h6>

        </div>
        <div class="card-body">

          <form action="{{ route('s.transaksi') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="hidden" class="form-control" id="invoice" name="code">
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Outlets</label>
                <select class="form-select" aria-label="Default select example" name="id_outlet">
                    <option selected>Select Outlets</option>
                      @foreach ($outlet as $item)
                         <option value="{{ $item->id }}">{{ $item->nama_outlet}}</option>
                      @endforeach
                  </select>
              </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Member Name</label>
                <select class="form-select" aria-label="Default select example" name="id_pelanggan">
                    <option selected>Select Member</option>
                      @foreach ($pelanggan as $item)
                         <option value="{{ $item->id }}">{{ $item->nama}}</option>
                      @endforeach
                  </select>
              </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Package Name</label>
                <select class="form-select" aria-label="Default select example" id="id_paket" name="id_paket">
                    <option selected>select Package</option>
                      @foreach ($paket as $item)
                         <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_paket}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="mb-4">
                <label for="qty" class="form-label">Price</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly>
                @error('harga')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" class="form-control" id="qty" name="qty">
                @error('qty')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="batas_waktu" class="form-label">Deadline</label>
                <input type="datetime-local" class="form-control" id="batas_waktu" name="batas_waktu">
                @error('batas_waktu')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="tgl_bayar" class="form-label">Pay Date</label>
                <input type="datetime-local" class="form-control" id="tgl_bayar" name="tgl_bayar">
                @error('tgl_bayar')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="biaya_tambahan" class="form-label">Additional Cost</label>
                <input type="number" class="form-control" id="biaya_tambahan" name="biaya_tambahan">
                @error('biaya_tambahan')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="diskon" class="form-label">Discount%</label>
                <input type="number" class="form-control" id="diskon" name="diskon">
                @error('diskon')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="pajak" class="form-label">Tax%</label>
                <input type="number" class="form-control" id="pajak" name="pajak">
                @error('pajak')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected>Select Status</option>
                    <option value="baru">New</option>
                    <option value="proses">Process</option>
                    <option value="selesai">Done</option>
                    <option value="diambil">Taken</option>
                  </select>
              </div>

              <div class="mb-3">
                <label for="dibayar" class="form-label">Payment</label>
                <select class="form-select" aria-label="Default select example" name="dibayar">
                    <option selected>Select Payment</option>
                    <option value="belum_bayar">Not Yet Paid</option>
                    <option value="selesai_bayar">Done Paying</option>
                  </select>
              </div>

              <div class="mb-4">
                <label for="keterangan" class="form-label">Information</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
                @error('keterangan')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <a href="{{ route('transaksi') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>

          </div>
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

      <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function () {
            $('#id_paket').on('change', function () {
                var harga=$('#id_paket option:selected').data('harga')
                $('#harga').val(harga);
            })
         })
      </script>
    {{-- End-JavaScript --}}

</body>

</html>
