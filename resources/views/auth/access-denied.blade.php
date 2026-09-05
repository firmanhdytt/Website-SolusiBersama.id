<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Tersedia</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-4xl w-full flex flex-col md:flex-row items-center gap-10">

        <!-- LEFT TEXT -->
        <div class="w-full md:w-1/2">
            <h1 class="text-4xl font-bold text-gray-900 mb-4 leading-tight">
                Maaf, Anda Tidak Memiliki Akses
            </h1>

            <p class="text-gray-600 mb-6">
                Halaman ini hanya dapat diakses oleh Admin SolusiBersama.id.
            </p>

            <a href="{{ url('/') }}"
               class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 inline-flex items-center gap-2">
                ⟲ Kembali ke Beranda
            </a>
        </div>

        <!-- RIGHT IMAGE -->
        <div class="w-full md:w-1/2 flex justify-center">
            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486802.png"
                 alt="404"
                 class="w-64 md:w-72">
        </div>

    </div>

</body>
</html>
