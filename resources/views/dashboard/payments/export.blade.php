<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pembayaran - SolusiBersama</title>

    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #111;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo {
            width: 70px;
            margin-bottom: 6px;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .company-sub {
            font-size: 11px;
            color: #555;
            margin-top: 2px;
        }

        .report-title {
            margin-top: 14px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .meta {
            margin-top: 6px;
            font-size: 10px;
            color: #555;
        }

        .divider {
            border-top: 2px solid #333;
            margin: 14px 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 6px 8px;
        }

        th {
            background: #f1f5f9;
            font-size: 11px;
            text-align: left;
        }

        td {
            font-size: 10.5px;
        }

        .text-right {
            text-align: right;
        }

        .status-belum {
            background: #fff7cc;
        }

        .status-dp {
            background: #e8f0ff;
        }

        .status-lunas {
            background: #e7f9ef;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #555;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .signature-line {
            margin-top: 50px;
            border-top: 1px solid #333;
            width: 200px;
            text-align: center;
            float: right;
        }
    </style>
</head>

<body>

    {{-- ================= HEADER ================= --}}
    <div class="header">
        {{-- LOGO --}}
        <img src="{{ public_path('images/icons/idea.png') }}" class="logo">

        <div class="company-name">SOLUSI BERSAMA</div>
        <div class="company-sub">
            Solusi Digital Terpadu untuk Bisnis Modern
        </div>

        <div class="report-title">Laporan Pembayaran</div>

        <div class="meta">
            Dicetak pada: {{ now()->translatedFormat('d F Y H:i') }}
        </div>
    </div>

    <div class="divider"></div>

    {{-- ================= TABLE ================= --}}
    <table>
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="16%">Nama</th>
                <th width="18%">Email</th>
                <th width="14%">Layanan</th>
                <th width="12%">Total</th>
                <th width="12%">Dibayar</th>
                <th width="12%">Sisa</th>
                <th width="12%">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($payments as $i => $payment)
                @php
                    $order = $payment->order;
                    $paid = $order->totalPaid();
                    $remaining = $order->remainingPayment();
                    $status = $order->status_pembayaran;
                @endphp

                <tr class="status-{{ $status }}">
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $order->nama }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->layanan }}</td>

                    <td class="text-right">
                        Rp {{ number_format($order->budget, 0, ',', '.') }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($paid, 0, ',', '.') }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($remaining, 0, ',', '.') }}
                    </td>

                    <td>{{ ucfirst($status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ================= FOOTER ================= --}}
    <div class="footer">
        <p>
            Laporan ini dihasilkan secara otomatis oleh sistem
            <strong>SolusiBersama</strong>.
            Data bersifat valid sesuai transaksi yang tercatat.
        </p>
    </div>

    <div class="signature">
        <div class="signature-line">
            Admin / Finance
        </div>
    </div>

</body>

</html>