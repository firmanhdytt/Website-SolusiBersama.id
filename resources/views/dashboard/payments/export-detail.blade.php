<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Pembayaran - SolusiBersama</title>

    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #111;
        }

        .header {
            text-align: center;
            margin-bottom: 14px;
        }

        .logo {
            width: 70px;
            margin-bottom: 6px;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: .5px;
        }

        .company-sub {
            font-size: 11px;
            color: #555;
        }

        .report-title {
            margin-top: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .meta {
            font-size: 10px;
            color: #555;
            margin-top: 2px;
        }

        .divider {
            border-top: 2px solid #333;
            margin: 14px 0;
        }

        .section-title {
            font-size: 13px;
            font-weight: bold;
            margin: 14px 0 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 6px 8px;
        }

        th {
            background: #f1f5f9;
            font-size: 11px;
        }

        td {
            font-size: 10.5px;
        }

        .no-border td {
            border: none;
            padding: 4px 0;
        }

        .text-right {
            text-align: right;
        }

        .summary-table td {
            border: 1px solid #444;
            padding: 6px 8px;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #555;
        }

        .signature {
            margin-top: 50px;
            width: 100%;
        }

        .signature-box {
            width: 220px;
            float: right;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #333;
            margin-top: 60px;
            padding-top: 4px;
            font-size: 10px;
        }
    </style>
</head>

<body>

    {{-- ================= HEADER ================= --}}
    <div class="header">
        <img src="{{ public_path('images/icons/idea.png') }}" class="logo">

        <div class="company-name">SOLUSI BERSAMA</div>
        <div class="company-sub">Solusi Digital Terpadu untuk Bisnis Modern</div>

        <div class="report-title">Detail Pembayaran</div>
        <div class="meta">
            Dicetak pada {{ now()->translatedFormat('d F Y H:i') }}
        </div>
    </div>

    <div class="divider"></div>

    {{-- ================= INFORMASI PESANAN ================= --}}
    <div class="section-title">Informasi Pesanan</div>

    <table class="no-border">
        <tr>
            <td width="25%">Nama</td>
            <td width="75%">: {{ $order->nama }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $order->email }}</td>
        </tr>
        <tr>
            <td>Layanan</td>
            <td>: {{ $order->layanan }}</td>
        </tr>
    </table>

    <table style="margin-top:10px;">
        <tr>
            <th width="50%">Total Tagihan</th>
            <th width="50%">Status Pembayaran</th>
        </tr>
        <tr>
            <td class="text-center">
                Rp {{ number_format($order->budget, 0, ',', '.') }}
            </td>
            <td class="text-center">
                {{ strtoupper($order->status_pembayaran) }}
            </td>
        </tr>
    </table>

    {{-- ================= HISTORI PEMBAYARAN ================= --}}
    <div class="section-title">Histori Pembayaran</div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Tanggal</th>
                <th width="20%">Metode</th>
                <th width="25%">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->payments as $i => $pay)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($pay->paid_at)->translatedFormat('d F Y H:i') }}</td>
                    <td class="text-center">{{ strtoupper($pay->method) }}</td>
                    <td class="text-center">
                        Rp {{ number_format($pay->amount, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ================= RINGKASAN ================= --}}
    @php
        $paid = $order->totalPaid();
        $remaining = $order->remainingPayment();
    @endphp

    <div class="section-title">Ringkasan Pembayaran</div>

    <table class="summary-table">
        <tr>
            <td width="40%">Total Dibayar</td>
            <td class="text-right">
                Rp {{ number_format($paid, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Sisa Pembayaran</td>
            <td class="text-right">
                Rp {{ number_format($remaining, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Status Akhir</td>
            <td class="text-right">
                {{ strtoupper($order->status_pembayaran) }}
            </td>
        </tr>
    </table>

    {{-- ================= FOOTER & TTD ================= --}}
    <div class="footer">
        <p>
            Dokumen ini merupakan bukti sah pembayaran yang dihasilkan secara otomatis
            oleh sistem <strong>SolusiBersama</strong>.
        </p>
    </div>
<br><br>
    <div class="signature">
        <div class="signature-box">
            <div class="signature-line">
                Admin / Finance
            </div>
        </div>
    </div>

</body>

</html>