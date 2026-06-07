<!DOCTYPE html>
<html>
<head>
    <title>OceanBite Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 pb-28">

<!-- Navbar -->
<nav class="bg-white shadow-sm border-b sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <div>
            <h1 class="text-2xl font-bold text-cyan-600">
                OceanBite
            </h1>

            <p class="text-sm text-gray-400">
                Seafood & Dimsum Premium
            </p>
        </div>

        <a href="/logout"
           class="bg-red-500 text-white px-5 py-2 rounded-xl text-sm font-medium hover:bg-red-600 transition">
            Logout
        </a>

    </div>

</nav>

<!-- Main -->
<div class="max-w-7xl mx-auto px-6 py-6">

    <!-- Hero Section -->
    <div class="bg-white rounded-2xl px-8 py-6 shadow-sm mb-6 border border-slate-100">

        <div class="flex items-center justify-between">

            <!-- Left -->
            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Menu OceanBite
                </h1>

                <p class="text-sm text-gray-500 mt-2 max-w-xl leading-relaxed">
                    Temukan cita rasa terbaik dari seafood premium,
                    dimsum pilihan, dan minuman segar yang dibuat
                    dengan bahan berkualitas setiap hari.
                </p>

            </div>

            <!-- Right -->
            <div class="hidden md:block text-right">

                <p class="text-sm text-gray-400">
                    Freshly Cooked Daily
                </p>

                <p class="text-sm text-cyan-600 font-semibold mt-1">
                    Quality Ingredients • Premium Taste
                </p>

            </div>

        </div>

    </div>

    <!-- Menu Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

        @foreach($menus as $menu)

        @php
            $cart = session('cart', []);
            $qty = isset($cart[$menu->id_menu])
                ? $cart[$menu->id_menu]['qty']
                : 0;
        @endphp

        <!-- Menu Card -->
        <div id="menu-{{ $menu->id_menu }}"
             class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition duration-300">

            <!-- Image -->
            <img
                src="{{ asset('images/'.$menu->gambar) }}"
                class="w-full h-40 object-cover"
            >

            <!-- Content -->
            <div class="p-4">

                <h2 class="font-bold text-lg text-slate-800">
                    {{ $menu->nama_menu }}
                </h2>

                <p class="text-gray-500 text-sm mt-2 h-10 overflow-hidden">
                    {{ $menu->deskripsi }}
                </p>

                <p class="text-cyan-600 font-bold text-xl mt-3">
                    Rp {{ number_format($menu->harga) }}
                </p>

                @if($qty == 0)

                    <!-- Add Button -->
                    <form
                        action="/cart/add/{{ $menu->id_menu }}"
                        method="POST"
                        class="mt-4">

                        @csrf

                        <button
                            class="w-full bg-cyan-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-cyan-700 transition">
                            Tambah ke Keranjang
                        </button>

                    </form>

                @else

                    <!-- Quantity -->
                    <div class="flex items-center justify-between mt-4">

                        <a
                            href="/cart/decrease/{{ $menu->id_menu }}"
                            class="w-9 h-9 flex items-center justify-center bg-gray-200 rounded-lg font-bold hover:bg-gray-300 transition">
                            -
                        </a>

                        <span class="text-lg font-bold text-slate-800">
                            {{ $qty }}
                        </span>

                        <a
                            href="/cart/increase/{{ $menu->id_menu }}"
                            class="w-9 h-9 flex items-center justify-center bg-cyan-600 text-white rounded-lg font-bold hover:bg-cyan-700 transition">
                            +
                        </a>

                    </div>

                    <!-- Remove -->
                    <a
                        href="/cart/remove/{{ $menu->id_menu }}"
                        class="block text-center mt-3 text-sm text-red-500 font-medium hover:text-red-600">
                        Hapus dari keranjang
                    </a>

                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>

@php
    $cart = session('cart', []);
    $total = 0;
    $totalItem = 0;

    foreach($cart as $item){
        $total += $item['harga'] * $item['qty'];
        $totalItem += $item['qty'];
    }
@endphp

<!-- Sticky Checkout -->
@if($totalItem > 0)

<div class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <div>

            <p class="text-sm text-gray-500">
                {{ $totalItem }} item dipilih
            </p>

            <h2 class="text-2xl font-bold text-cyan-600">
                Rp {{ number_format($total) }}
            </h2>

        </div>

        <a href="/checkout"
           class="bg-cyan-600 text-white px-8 py-3 rounded-xl text-sm font-medium hover:bg-cyan-700 transition">
            Checkout
        </a>

    </div>

</div>

@endif

</body>
</html>