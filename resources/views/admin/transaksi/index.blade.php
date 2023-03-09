
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Transaksi</title>

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
    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Transaksi</h6>

            {{-- FORM SEARCH --}}
            <form action="/transaksi" method="GET" class="d-none d-sm-inline-block  align-items-center">
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

            <a href="/addtransaksi" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Invoice</th>
                            <th>Outlet</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket & Harga</th>
                            <th>Qty</th>
                            <th>Tanggal Transaksi</th>
                            <th>Batas Waktu</th>
                            <th>Tanggal Bayar</th>
                            <th>Biaya Tambahan</th>
                            <th>Diskon%</th>
                            <th>Pajak%</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Sub Total</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                     @php
                         $no = 1
                     @endphp

                    @foreach ($transaksi as $item)

                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->outlets->nama_outlet}}</td>
                            <td>{{ $item->pelanggans->nama }}</td>
                            <td>{{ $item->pakets->nama_paket }} - Rp.{{ $item->pakets->harga }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->tgl }}</td>
                            <td>{{ $item->batas_waktu }}</td>
                            <td>{{ $item->tgl_bayar }}</td>
                            <td>Rp.{{ $item->biaya_tambahan }}</td>
                            <td>{{ $item->diskon }}%</td>
                            <td>{{ $item->pajak }}%</td>
                            <td>
                                <a href="/editstatustransaksi/{{ $item->id }}" class="btn btn-sm btn-white" style="height: 30px">
                                    <label class="text-secondary">{{ $item->status }}</label>
                                </a>
                            </td>
                            <td>

                                <a href="/editpembayaran/{{ $item->id }}" class="btn btn-sm btn-white" style="height: 30px">
                                    <label class=" text-secondary">{{ $item->dibayar }}</label>
                                </a>
                            </td>
                            <td>Rp.{{ $item->total }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="/ubah/{{ $item->id }}" class="btn btn-success mb-2">
                                    <i class="fas fa-edit fa-sm text-white-50"></i>
                                </a>

                                </a>
                                <a href="/invoice/{{ $item->id }}" class="btn btn-info">
                                    <i class="fas fa-file-invoice fa-sm text-white-50"></i>
                                </a>
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
