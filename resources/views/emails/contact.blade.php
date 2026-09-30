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
        📩 Pesan Baru dari Pengunjung Website
    </div>

    <p>Anda menerima pesan dari pengunjung website SolusiBersama.com.</p>

    <h3 class="section-title">Detail Pengirim</h3>
    <ul class="info-list">
        <li><span class="label">Nama:</span> {{ $data['name'] }}</li>
        <li><span class="label">Email:</span> {{ $data['email'] }}</li>
        <li><span class="label">Telepon:</span> {{ $data['phone'] }}</li>
        <li><span class="label">Subjek:</span> {{ $data['subject'] }}</li>
    </ul>

    <h3 class="section-title">Isi Pesan</h3>
    <p style="white-space: pre-line; font-size: 15px; line-height: 1.6;">
        {{ $data['message'] }}
    </p>

    <div class="footer">
        Email ini dikirim otomatis oleh sistem SolusiBersama.com.  
        Silakan balas langsung ke email pengirim jika diperlukan.
    </div>

</div>

</body>
</html>
