<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Invoice</title>

     <style type="text/css">
                .invoice-box {
                     max-width: 800px;
                     margin: auto;
                     padding: 30px;
                     border: 1px solid #eee;
                     box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                     font-size: 16px;
                     line-height: 24px;
                     font-family: Arial, Helvetica, sans-serif;
                }

                .invoice-box table{
                    width: 100%;
                    line-height: inherit;
                    text-align: left;
                }

                .invoice-box table td{
                    padding: 5px;
                    vertical-align: top;
                }

                .invoice-box table tr td:nth-child(2){
                    text-align: right;
                }

                .invoice-box table tr.top table td {
                    padding-bottom: 20px;
                }

                .invoice-box table tr.information table td{
                    padding-bottom: 40px;
                }

                .invoice-box table tr.heading td {
                    background: #eee;
                    border-bottom: 1px solid #ddd;
                    font-weight: bold;
                }

                .invoice-box table tr.item td{
                    border-bottom: 1px solid #eee;
                }

                @media print{
                    .no-print{
                        display: none;
                    }
                }
     </style>
</head>
<body>

  <div class="invoice-box">
     <table cellspacing="0" cellpadding="0">
          <tr class="top">
               <td colspan="2">
                    {{-- table --}}
                    <table>
                         <tr>
                              <td>
                                   <h2 style="color: rgb(10, 136, 37)">Abroor Laundry</h4>
                              </td>
                              <td>
                                   {{ $transaksi->code }} <br>
                                   {{ $transaksi->tgl }}
                              </td>
                         </tr>
                    </table>
                    {{-- end table --}}
               </td>
          </tr>

          <tr class="information">
               <td colspan="2">
                    {{-- begin table --}}
                    <table>
                         <tr>
                              <td>
                                   Kepada Member : {{ $transaksi->pelanggans->nama }} <br>
                                   No Telpon : {{ $transaksi->pelanggans->no_tlp }} <br>
                                   Batas Tanggal Pembayaran : {{ $transaksi->batas_waktu }}
                              </td>

                              <td>
                                   Nama Pegawai : {{ Auth::user()->nama }} <br>
                                   Jabatan : {{ Auth::user()->username }}
                              </td>
                         </tr>
                    </table>
                    {{-- end begin table --}}
               </td>
          </tr>

<table>
     <tr class="heading">
          <td>Nama Paket</td>
          <td style="text-align: left">Quantity</td>
          <td>Harga Paket</td>
          <td>Biaya Tambahan</td>
          <td>Diskon</td>
          <td>Pajak</td>
          <td>Total</td>
     </tr>

     <tr class="item">
          <td>{{ $transaksi->pakets->nama_paket }}</td>
          <td style="text-align: left">{{ $transaksi->qty }}</td>
          <td>Rp.{{ $transaksi->pakets->harga }}</td>
          <td>Rp.{{ $transaksi->biaya_tambahan }}</td>
          <td>{{ $transaksi->diskon }}%</td>
          <td>{{ $transaksi->pajak }}%</td>
          <td>Rp.{{ $transaksi->total }}</td>
     </tr>

</table>

<button class="no-print" onclick="printInvoice()" style="margin-top: 10px">Cetak</button>

<script>
    function printInvoice() {
        window.print();
    }
</script>

     </table>
  </div>

</body>
</html>
