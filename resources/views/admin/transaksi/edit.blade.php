
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Transaksi</title>

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
    <h1 class="h3 mb-2 text-gray-800">Edit Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Transaksi</h6>

        </div>
        <div class="card-body">

          <form action="{{ route('update.transaksi', $transaksi->id ) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="invoice" class="form-label">Kode Invoice</label>
                <input type="text" class="form-control" id="invoice" name="kd_invoice" value="{{ $transaksi->code }}" disabled>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Outlet</label>
                <select class="form-select" aria-label="Default select example" name="id_outlet" disabled>
                    <option selected value="{{ $transaksi->id_outlet }}">{{ $transaksi->outlets->nama_outlet }}</option>
                      @foreach ($outlet as $item)
                         <option value="{{ $item->id }}">{{ $item->nama_outlet}}</option>
                      @endforeach
                  </select>
              </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pelanggan</label>
                <select class="form-select" aria-label="Default select example" name="id_pelanggan" disabled>
                    <option selected value="{{ $transaksi->id_pelanggan }}">{{ $transaksi->pelanggans->nama }}</option>
                      @foreach ($pelanggan as $item)
                         <option value="{{ $item->id }}">{{ $item->nama}}</option>
                      @endforeach
                  </select>
              </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Paket</label>
                <select class="form-select" aria-label="Default select example" name="id_paket" disabled>
                    <option selected value="{{ $transaksi->id_paket }}">{{ $transaksi->pakets->nama_paket}}</option>
                      @foreach ($paket as $item)
                         <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_paket}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="mb-4">
                <label for="qty" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly value="{{ $item->harga }}">
                @error('harga')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" class="form-control" id="qty" name="qty" value="{{ $transaksi->qty }}">
                @error('qty')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="tgl" class="form-label">Tanggal Transaksi</label>
                <input type="datetime-local" class="form-control" id="tgl" name="tgl" value="{{ $transaksi->tgl }}">
                @error('tgl')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="batas_waktu" class="form-label">Batas Waktu</label>
                <input type="datetime-local" class="form-control" id="batas_waktu" name="batas_waktu" value="{{ $transaksi->batas_waktu }}">
                @error('batas_waktu')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                <input type="datetime-local" class="form-control" id="tgl_bayar" name="tgl_bayar" value="{{ $transaksi->tgl_bayar }}">
                @error('tgl_bayar')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="biaya_tambahan" class="form-label">Biaya Tambahan</label>
                <input type="number" class="form-control" id="biaya_tambahan" name="biaya_tambahan" value="{{ $transaksi->biaya_tambahan }}">
                {{-- <input type="checkbox" name="use_biaya_tambahan" id="use_biaya_tambahan"> Gunakan biaya tambahan --}}
                @error('biaya_tambahan')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="diskon" class="form-label">Diskon%</label>
                <input type="number" class="form-control" id="diskon" name="diskon" value="{{ $transaksi->diskon }}">
                {{-- <input type="checkbox" name="use_diskon" id="use_diskon"> Gunakan diskon --}}
                @error('diskon')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="pajak" class="form-label">Pajak%</label>
                <input type="number" class="form-control" id="pajak" name="pajak" value="{{ $transaksi->pajak }}">
                {{-- <input type="checkbox" name="use_pajak" id="use_pajak"> Gunakan pajak --}}
                @error('pajak')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected>{{ $transaksi->status}}</option>
                    <option value="baru">Baru</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="diambil">Diambil</option>
                  </select>
              </div>

              <div class="mb-3">
                <label for="dibayar" class="form-label">Pembayaran</label>
                <select class="form-select" aria-label="Default select example" name="dibayar">
                    <option selected>{{ $transaksi->dibayar }}</option>
                    <option value="belum_bayar">Belum Bayar</option>
                    <option value="selesai_bayar">Selesai Bayar</option>
                  </select>
              </div>

              <div class="mb-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $transaksi->keterangan }}">
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

{{-- <script>
    let useBiayaTambahan = document.getElementById('use_biaya_tambahan');
    let biayaTambahan = document.getElementById('biaya_tambahan');
    let useDiskon = document.getElementById('use_diskon');
    let diskon = document.getElementById('diskon');
    let usePajak = document.getElementById('use_pajak');
    let pajak = document.getElementById('pajak');

    useBiayaTambahan.addEventListener('click', function() {
        if (useBiayaTambahan.checked) {
            biayaTambahan.disabled = false;
        } else {
            biayaTambahan.disabled = true;
        }
    });

    useDiskon.addEventListener('click', function() {
        if (useDiskon.checked) {
            diskon.disabled = false;
        } else {
            diskon.disabled = true;
        }
    });

    usePajak.addEventListener('click', function() {
        if (usePajak.checked) {
            pajak.disabled = false;
        } else {
            pajak.disabled = true;
        }
    });
</script> --}}

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
