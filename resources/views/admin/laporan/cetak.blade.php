<html>
<head>
    <title id="judul">Transaction Report</title>
    <style type="text/css">
          @media print{
            .no-print{
                display: none;
            }
          }
    </style>
</head>
<body>
    <h1>Transaction Report</h1>
    <p>Period: {{ $tgl}} until {{ $batas_waktu }}</p>

    <div class="container">
        <div class="row">
            <table border="1" cellpadding="10px" cellspacing="0">
                <thead>
                    <tr>
                            <th>No</th>
                            <th>Invoice Code</th>
                            <th>Outlets</th>
                            <th>Member Name</th>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Transaction Date</th>
                            <th>Deadline</th>
                            <th>Pay Date</th>
                            <th>Additional Cost</th>
                            <th>Discount%</th>
                            <th>Tax%</th>
                            <th>Status</th>
                            <th>Payments</th>
                            <th>Sub Total</th>
                            <th>Ket</th>
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
                        <td>{{ $item->pakets->nama_paket }}</td>
                        <td>Rp.{{ $item->pakets->harga }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->tgl }}</td>
                        <td>{{ $item->batas_waktu }}</td>
                        <td>{{ $item->tgl_bayar }}</td>
                        <td>Rp.{{ $item->biaya_tambahan }}</td>
                        <td>{{ $item->diskon }}%</td>
                        <td>{{ $item->pajak }}%</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->dibayar }}</td>
                        <td>Rp.{{ $item->total }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


    <button class="no-print" onclick="printLaporan()" style="margin-top: 10px">Print</button>

    {{-- <div class="container">
        <div class="row">
            <h3 style="text-align: right">Total : </h3>
        </div>

    </div> --}}


    <script>
        function printLaporan() {
            window.print();
        }
    </script>
</body>
</html>
