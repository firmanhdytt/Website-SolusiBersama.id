<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SolusiBersama.com</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4">

    <!-- WRAPPER -->
    <div class="bg-white w-full max-w-5xl shadow-2xl rounded-2xl overflow-hidden flex flex-col lg:flex-row">

        <!-- =============== LEFT SIDE: FORM LOGIN =============== -->
        <div class="w-full lg:w-1/2 p-10 bg-white">

            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                Selamat Datang 
            </h2>

            <p class="text-gray-600 mb-8">
                Akses Dashboard Penjualan Anda untuk Insight Bisnis yang Lebih Baik
            </p>

            <!-- ERROR MESSAGE -->
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    <strong>Login gagal:</strong> {{ $errors->first() }}
                </div>
            @endif

            <!-- FORM LOGIN -->
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <!-- EMAIL -->
                <label class="text-sm font-medium text-gray-700">Email</label>
                <input name="email" type="email"
                    class="w-full mt-1 mb-4 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="masukkan email Anda" required>

                <!-- PASSWORD -->
                <label class="text-sm font-medium text-gray-700">Kata Sandi</label>
                <input name="password" type="password"
                    class="w-full mt-1 mb-4 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="masukkan kata sandi Anda" required>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 text-blue-600">
                        <span class="text-sm text-gray-600">Ingat Saya</span>
                    </label>

                    <a href="#" class="text-sm text-blue-400 hover:text-blue-500 font-semibold">
                        Lupa Kata Sandi?
                    </a>
                </div>

                <!-- SUBMIT -->
                <button
                    class="w-full bg-blue-400 text-white py-3 rounded-lg font-semibold hover:bg-blue-500 transition">
                    Login
                </button>

            </form>

            <p class="text-center mt-6 text-sm text-gray-600">
                Belum punya akun?
                <a href="#" class="text-blue-400 font-semibold hover:text-blue-500">Daftar Sekarang</a>
            </p>

        </div>

        <div class="w-full lg:w-1/2 p-10 bg-white flex flex-col items-center justify-center text-center">

            <!-- ICON (BESAR, TANPA BG) -->
            <img src="/images//logo-biru.png" alt="Idea Icon" class="w-20 h-20 mb-1">

            <!-- BRAND -->
            <h1 class="text-3xl font-bold mb-3">
                <span class="text-blue-400">SolusiBersama</span>
            </h1>

            <!-- HEADLINE -->
            {{-- <h2 class="text-xl font-semibold leading-snug mb-4 max-w-md">
                Solusi Digital untuk<br>
                Meningkatkan Penjualan Anda
            </h2> --}}

            <!-- DESCRIPTION -->
            <p class="text-gray-600 leading-relaxed max-w-md">
                Hadir sebagai solusi digital terpadu untuk membantu <br>bisnis meningkatkan penjualan dan pengelolaan <br>data
                secara efisien. Dengan sistem yang <br> modern, aman, & mudah digunakan, <br> kami membantu Anda  mengambil
                <br>keputusan bisnis yang  lebih <br> cepat dan tepat.
            </p>

        </div>



    </div>

</body>

</html>