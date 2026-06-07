<!DOCTYPE html>
<html>
<head>
    <title>Dashboard OceanBite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

<!-- Navbar -->
<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-8 py-5 flex justify-between items-center">

        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-cyan-600 text-white flex items-center justify-center text-xl font-bold">
                O
            </div>

            <h1 class="text-2xl font-bold text-slate-800">
                OceanBite
            </h1>
        </div>

        <a href="/logout"
           class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl font-semibold transition">
            Logout
        </a>

    </div>
</nav>

<!-- Main -->
<section class="max-w-7xl mx-auto px-8 py-10">

    <!-- Hero -->
    <div class="grid md:grid-cols-2 gap-8 items-center">

        <!-- Left -->
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 rounded-[30px] p-10 text-white shadow-lg">

            <p class="text-base opacity-80 mb-4">
                Welcome Back 👋
            </p>

            <h2 class="text-4xl font-bold leading-tight mb-5">
                Halo, {{ session('username') }}
            </h2>

            <p class="text-lg opacity-90 mb-8">
                Siap pesan seafood & dimsum favoritmu hari ini?
            </p>

            <a href="/menu"
               class="inline-block bg-white text-cyan-700 px-7 py-4 rounded-2xl font-bold hover:scale-105 transition">
                Pesan Sekarang
            </a>

        </div>

        <!-- Right -->
        <div class="grid grid-cols-2 gap-5">

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm mb-2">
                    Status Akun
                </p>

                <h3 class="text-2xl font-bold text-slate-800">
                    Aktif
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm mb-2">
                    Member
                </p>

                <h3 class="text-2xl font-bold text-slate-800">
                    User
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm mb-2">
                    Promo Hari Ini
                </p>

                <h3 class="text-2xl font-bold text-slate-800">
                    25%
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <p class="text-gray-500 text-sm mb-2">
                    Menu Tersedia
                </p>

                <h3 class="text-2xl font-bold text-slate-800">
                    12+
                </h3>
            </div>

        </div>

    </div>

    <!-- Menu Favorit -->
    <div class="mt-14">

        <h2 class="text-3xl font-bold text-slate-800 mb-6">
            Menu Favorit
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- Favorit 1 -->
            <a href="/menu"
               class="bg-white rounded-3xl p-6 shadow-sm hover:-translate-y-1 transition">

                <img src="/images/cumi.jpg"
                     class="w-full h-44 object-cover rounded-2xl mb-5">

                <h3 class="text-xl font-bold mb-2 text-slate-800">
                    Cumi Crispy
                </h3>

                <p class="text-gray-500 mb-3">
                    Seafood favorit dengan saus spesial.
                </p>

                <p class="text-cyan-600 font-bold text-lg">
                    Rp 35.000
                </p>

            </a>

            <!-- Favorit 2 -->
            <a href="/menu"
               class="bg-white rounded-3xl p-6 shadow-sm hover:-translate-y-1 transition">

                <img src="/images/udang.jpg"
                     class="w-full h-44 object-cover rounded-2xl mb-5">

                <h3 class="text-xl font-bold mb-2 text-slate-800">
                    Udang Saus Padang
                </h3>

                <p class="text-gray-500 mb-3">
                    Udang segar dengan saus padang pedas.
                </p>

                <p class="text-cyan-600 font-bold text-lg">
                    Rp 45.000
                </p>

            </a>

            <!-- Favorit 3 -->
            <a href="/menu"
               class="bg-white rounded-3xl p-6 shadow-sm hover:-translate-y-1 transition">

                <img src="/images/thaitea.jpg"
                     class="w-full h-44 object-cover rounded-2xl mb-5">

                <h3 class="text-xl font-bold mb-2 text-slate-800">
                    Thai Tea
                </h3>

                <p class="text-gray-500 mb-3">
                    Minuman creamy favorit pelanggan.
                </p>

                <p class="text-cyan-600 font-bold text-lg">
                    Rp 17.000
                </p>

            </a>

        </div>

    </div>

</section>

</body>
</html>