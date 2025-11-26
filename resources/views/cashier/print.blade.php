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
            width: 80mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            position: relative;
            overflow: hidden;
            padding: 0;
        }

        @media screen {
            .receipt-container {
                max-width: 320px;
                min-height: auto;
                margin: 20px auto;
                border: 2px solid #e9ecef;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
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
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }

            .receipt-container {
                box-shadow: none;
                border: none;
                width: 80mm !important;
                min-height: 297mm !important;
                margin: 0;
                padding: 0;
                page-break-inside: avoid;
            }

            .receipt-header::after {
                display: none;
            }

            .receipt-perforation::before {
                display: none;
            }

            .receipt-container::before {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .receipt-container {
                margin: 10px;
                width: 100%;
                max-width: none;
            }
        }

        @page {
            size: 80mm auto;
            margin: 0;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="receipt-container">
        <!-- Cafe Header -->
        <div class="receipt-header">
            <div class="cafe-logo">
                <i class="fas fa-coffee"></i>
            </div>
            <div class="cafe-name">Cafe Biru</div>
            <div class="cafe-tagline">Modern Coffee Experience</div>
            <div class="receipt-perforation"></div>
        </div>

        <!-- Transaction Info -->
        <div class="receipt-info">
            <div class="info-row">
                <span><strong>Tanggal:</strong></span>
                <span>{{ now()->format('d/m/Y H:i') }}</span>
            </div>
            <div class="info-row">
                <span><strong>Kasir:</strong></span>
                <span>{{ Auth::user()->name }}</span>
            </div>
        </div>

        <!-- Items Table -->
        <div class="receipt-body">
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th class="item-qty">Qty</th>
                        <th class="item-price">@</th>
                        <th class="item-total">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subtotal = 0;
                    @endphp
                    @foreach ($cashier['items'] as $item)
                        @php
                            $itemTotal = $item['price_sell'] * $item['stock'];
                            $subtotal += $itemTotal;
                        @endphp
                        <tr>
                            <td class="item-name">{{ $item['name'] }}</td>
                            <td class="item-qty">{{ $item['stock'] }}</td>
                            <td class="item-price">{{ number_format($item['price_sell'], 0, '.', '.') }}</td>
                            <td class="item-total">{{ number_format($itemTotal, 0, '.', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Summary Section -->
            <div class="summary-section">
                <div class="summary-row">
                    <span>Subtotal:</span>
                    <span>{{ number_format($subtotal, 0, '.', '.') }}</span>
                </div>
                @if($cashier['discount'] > 0)
                <div class="summary-row">
                    <span>Diskon ({{ $cashier['discount'] }}%):</span>
                    <span>-{{ number_format($subtotal * $cashier['discount'] / 100, 0, '.', '.') }}</span>
                </div>
                @endif
                <div class="summary-row total">
                    <span>TOTAL:</span>
                    <span>{{ number_format($cashier['subtotal'] * (1 - $cashier['discount'] / 100), 0, '.', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Bayar:</span>
                    <span>{{ number_format($cashier['amount_paid'], 0, '.', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Kembalian:</span>
                    <span>{{ number_format($cashier['change'], 0, '.', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="receipt-footer">
            <div class="thank-you">Terima Kasih Atas Kunjungan Anda!</div>
            <div class="footer-text">Barang yang sudah dibeli tidak dapat dikembalikan</div>
            <div class="footer-text">Simpan struk ini sebagai bukti pembayaran</div>
            <div class="timestamp">Dicetak: {{ now()->format('d/m/Y H:i:s') }}</div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
