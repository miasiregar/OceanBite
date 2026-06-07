<!DOCTYPE html>
<html>
<head>
    <title>Keranjang OceanBite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-6xl mx-auto py-10 px-6">

    <h2 class="text-3xl font-bold mb-8">
        Keranjang Belanja
    </h2>

    @php
        $total = 0;
    @endphp

    @foreach($cart as $item)

        @php
            $subtotal = $item['harga'] * $item['qty'];
            $total += $subtotal;
        @endphp

        <div class="bg-white rounded-2xl shadow p-5 mb-5 flex items-center justify-between">

            <div class="flex items-center gap-5">

                <img
                    src="{{ asset('images/'.$item['gambar']) }}"
                    class="w-24 h-24 object-cover rounded-xl"
                >

                <div>
                    <h3 class="text-xl font-bold">
                        {{ $item['nama_menu'] }}
                    </h3>

                    <p class="text-gray-500">
                        Rp {{ number_format($item['harga']) }}
                    </p>

                    <p class="font-semibold mt-2">
                        Subtotal:
                        Rp {{ number_format($subtotal) }}
                    </p>
                </div>

            </div>

            <div class="flex items-center gap-4">

                <a href="/cart/decrease/{{ $item['id_menu'] }}"
                   class="bg-gray-300 px-4 py-2 rounded-lg">
                   -
                </a>

                <span class="font-bold text-lg">
                    {{ $item['qty'] }}
                </span>

                <a href="/cart/increase/{{ $item['id_menu'] }}"
                   class="bg-cyan-600 text-white px-4 py-2 rounded-lg">
                   +
                </a>

                <a href="/cart/remove/{{ $item['id_menu'] }}"
                   class="bg-red-500 text-white px-4 py-2 rounded-lg">
                   Hapus
                </a>

            </div>

        </div>

    @endforeach

    <div class="bg-white rounded-2xl shadow p-6 mt-8">

        <h3 class="text-2xl font-bold mb-4">
            Total Belanja
        </h3>

        <p class="text-3xl font-bold text-cyan-600">
            Rp {{ number_format($total) }}
        </p>

        <a href="/checkout"
           class="bg-cyan-600 text-white px-6 py-3 rounded-xl inline-block mt-5">
           Checkout Semua
        </a>

    </div>

</div>

</body>
</html>