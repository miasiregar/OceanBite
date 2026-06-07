<!DOCTYPE html>
<html>
<head>
    <title>OceanBite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

<!-- Navbar -->
<nav class="flex justify-between items-center px-10 py-6 shadow">

    <h1 class="text-3xl font-bold text-cyan-600">
        OceanBite
    </h1>

    <div class="flex gap-4">
        <a href="/login"
           class="px-6 py-2 border border-cyan-600 text-cyan-600 rounded-xl">
            Login
        </a>

        <a href="/register"
           class="px-6 py-2 bg-cyan-600 text-white rounded-xl">
            Register
        </a>
    </div>

</nav>

<!-- Hero -->
<section class="px-10 py-20">

    <div class="grid grid-cols-2 gap-10 items-center">

        <div>
            <h1 class="text-6xl font-bold leading-tight">
                Seafood & Dimsum
                Favoritmu
            </h1>

            <p class="text-gray-500 mt-6 text-xl">
                Pesan makanan favoritmu dengan cepat,
                mudah, dan modern seperti aplikasi
                pemesanan makanan masa kini.
            </p>

            <div class="mt-8 flex gap-4">

                <a href="/login"
                   class="bg-cyan-600 text-white px-8 py-4 rounded-xl">
                    Pesan Sekarang
                </a>

                <a href="/register"
                   class="border border-cyan-600 text-cyan-600 px-8 py-4 rounded-xl">
                    Daftar
                </a>

            </div>
        </div>

        <div>
            <img
                src="/images/hero-food.jpg"
                class="rounded-3xl shadow-xl w-full"
            >
        </div>

    </div>

</section>

<!-- Featured Menu -->
<section class="px-10 pb-20">

    <h2 class="text-4xl font-bold mb-10">
        Menu Favorit
    </h2>

    <div class="grid grid-cols-3 gap-8">

        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <img src="/images/cumi.jpg" class="w-full h-60 object-cover">
            <div class="p-5">
                <h3 class="font-bold text-xl">
                    Cumi Crispy
                </h3>
            </div>
        </div>

        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <img src="/images/udang.jpg" class="w-full h-60 object-cover">
            <div class="p-5">
                <h3 class="font-bold text-xl">
                    Udang Saus Padang
                </h3>
            </div>
        </div>

        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <img src="/images/dimsum_udang.jpg" class="w-full h-60 object-cover">
            <div class="p-5">
                <h3 class="font-bold text-xl">
                    Dimsum Udang
                </h3>
            </div>
        </div>

    </div>

</section>

</body>
</html>