<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - Cafe Biru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap');

        body {
            font-family: 'JetBrains Mono', 'Courier New', monospace;
            background: #f8f9fa;
            color: #2c3e50;
            line-height: 1.4;
        }

        .receipt-container {
            max-width: 320px;
            margin: 20px auto;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .receipt-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1976d2, #42a5f5, #1976d2);
        }

        .receipt-header {
            background: linear-gradient(135deg, #1976d2 0%, #42a5f5 100%);
            color: white;
            padding: 20px 15px;
            text-align: center;
            position: relative;
        }

        .receipt-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #1976d2;
        }

        .cafe-logo {
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .cafe-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .cafe-tagline {
            font-size: 0.8rem;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .receipt-info {
            padding: 15px;
            background: #f8f9fa;
            border-bottom: 1px dashed #dee2e6;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3px;
            font-size: 0.75rem;
        }

        .receipt-body {
            padding: 15px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 0.75rem;
        }

        .items-table th {
            border-bottom: 1px solid #dee2e6;
            padding: 5px 2px;
            text-align: left;
            font-weight: 600;
            color: #1976d2;
        }

        .items-table td {
            padding: 4px 2px;
            border-bottom: 1px dotted #e9ecef;
        }

        .item-name {
            font-weight: 500;
        }

        .item-qty {
            text-align: center;
            min-width: 30px;
        }

        .item-price, .item-total {
            text-align: right;
            min-width: 60px;
        }

        .summary-section {
            border-top: 1px dashed #dee2e6;
            padding-top: 10px;
            margin-top: 10px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3px;
            font-size: 0.75rem;
        }

        .summary-row.total {
            font-weight: 600;
            font-size: 0.8rem;
            color: #1976d2;
            border-top: 1px solid #dee2e6;
            padding-top: 5px;
            margin-top: 5px;
        }

        .receipt-footer {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 15px;
            text-align: center;
            border-top: 1px dashed #dee2e6;
            position: relative;
        }

        .thank-you {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1976d2;
            margin-bottom: 5px;
        }

        .footer-text {
            font-size: 0.7rem;
            color: #6c757d;
            margin-bottom: 3px;
        }

        .timestamp {
            font-size: 0.65rem;
            color: #adb5bd;
        }

        .receipt-perforation {
            border-top: 1px dashed #dee2e6;
            margin: 10px 0;
            position: relative;
        }

        .receipt-perforation::before {
            content: '••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••';
            position: absolute;
            top: -8px;
            left: 0;
            right: 0;
            font-size: 8px;
            color: #dee2e6;
            letter-spacing: 2px;
        }

        @media print {
            body {
                background: white !important;
                margin: 0;
                padding: 0;
            }

            .receipt-container {
                box-shadow: none;
                border: none;
                max-width: none;
                margin: 0;
                width: 100%;
            }

            .receipt-header::after {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .receipt-container {
                margin: 10px;
                max-width: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container d-flex justify-content-center mt-3">
        <div class="card " style="width: 30rem">
            <div class="card-body">
                <h4 class="text-center">Struk Pembayaran Ulang</h4>
                <p class="text-center">Kode Transaksi: {{ $transactions->first()->code }}</p>
                <p class="text-center">Tanggal: {{ now()->format('Y-m-d H:i:s') }}</p>
                <p class="text-center">Kasir: {{ Auth::user()->name }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->total_item }}</td>
                                <td>Rp. {{ number_format($item->product->price_sell, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($item->product->price_sell * $item->total_item , 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right">Diskon</td>
                            <td>{{ $transactions->first()->discount }} %</td>
                        </tr>

                        <tr>
                            <td colspan="3" class="text-right">Total</td>
                           <td>Rp. {{ number_format($transactions->sum('subtotal') * (1 - ($transactions->first()->discount / 100)), '0') }}</td>
                        </tr>
                       
                        <tr>
                            <td colspan="3" class="text-right">Bayar</td>
                            <td>Rp. {{ number_format($transactions->first()->amount_paid, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Kembalian</td>
                            <td>Rp. {{ number_format($transactions->first()->amount_paid - ($transactions->sum('subtotal') * (1 - ($transactions->first()->discount / 100))), 0) }}</td>                        </tr>
                    </tbody>
                </table>
        
                <p class="text-center">Terima kasih telah berbelanja!</p>
            </div>
        </div>
      
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
