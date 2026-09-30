<!doctype html>
<html lang="id" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SolusiBersama.com - Solusi Digital Terpercaya')</title>

    <!-- Global JS (route & CSRF) -->
    <script>
        window.LARAVEL = {
            contactRoute: "{{ route('contact.send') }}",
            orderRoute: "{{ route('order.send') }}",
            csrf: "{{ csrf_token() }}"
        };
    </script>

    <!-- VITE (Tailwind & JS) -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/landing.js'
    ])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <!-- Base Style -->
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0a0a0a;
        }

        /* Legacy animation & components (dipakai di landing lama) */
        .service-card {
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .modal {
            transition: opacity 0.3s ease;
        }

        .btn-primary {
            background-color: #3b82f6;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-whatsapp {
            background-color: #25D366;
            transition: 0.3s;
        }

        .btn-whatsapp:hover {
            background-color: #128C7E;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }
    </style>

    @stack('head')
</head>

<body class="antialiased text-white bg-background-dark">

    @yield('content')

    @stack('scripts')
</body>

</html>
