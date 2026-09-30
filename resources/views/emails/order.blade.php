<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background: #ffffff;
            max-width: 600px;
            margin: 30px auto;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
        }
        .header {
            background: #2563eb;
            color: white;
            padding: 18px;
            border-radius: 10px 10px 0 0;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            color: #111827;
        }
        .info-list {
            margin: 10px 0;
            padding: 0;
            list-style: none;
        }
        .info-list li {
            margin-bottom: 8px;
            font-size: 15px;
        }
        .label {
            font-weight: bold;
            color: #111827;
        }
        .footer {
            margin-top: 25px;
            font-size: 13px;
            color: #6b7280;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="email-container">

    <div class="header">
        📩 Pesanan Baru – SolusiBersama.com
    </div>

    <p>Anda menerima pesanan baru dari <strong>{{ $order->nama }}</strong>.</p>

    <h3 class="section-title">Detail Pemesan</h3>
    <ul class="info-list">
        <li><span class="label">Nama:</span> {{ $order->nama }}</li>
        <li><span class="label">Email:</span> {{ $order->email }}</li>
        <li><span class="label">Telepon:</span> {{ $order->telepon }}</li>
    </ul>

    <h3 class="section-title">Detail Layanan</h3>
    <ul class="info-list">
        <li><span class="label">Layanan:</span> {{ $order->layanan }}</li>
        <li><span class="label">Budget:</span> Rp {{ number_format($order->budget, 0, ',', '.') }}</li>
        <li><span class="label">Deadline:</span> {{ \Carbon\Carbon::parse($order->deadline)->translatedFormat('d F Y') }}</li>
        <li>
            <span class="label">Kebutuhan:</span>
            <br>{{ $order->pesan }}
        </li>
    </ul>

    <div class="footer">
        Email ini dikirim otomatis oleh sistem SolusiBersama.com.  
        Untuk detail lebih lanjut, silakan hubungi pemesan.
    </div>

</div>

</body>
</html>
