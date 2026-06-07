<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-5xl mx-auto p-8">

    <h1 class="text-4xl font-bold mb-8">
        Checkout Pesanan
    </h1>

    @php
        $total = 0;
    @endphp

    @foreach($cart as $item)

    @php
        $subtotal = $item['harga'] * $item['qty'];
        $total += $subtotal;
    @endphp

    <div class="bg-white p-5 rounded-2xl shadow mb-5">

        <div class="flex items-center gap-5">

            <img src="{{ asset('images/'.$item['gambar']) }}"
                 class="w-24 h-24 rounded-xl object-cover">

            <div>
                <h2 class="font-bold text-xl">
                    {{ $item['nama_menu'] }}
                </h2>

                <p>Qty: {{ $item['qty'] }}</p>
            </div>

            <div class="ml-auto font-bold text-cyan-600">
                Rp {{ number_format($subtotal) }}
            </div>

        </div>

    </div>

    @endforeach

    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-2xl font-bold mb-4">
            Total:
        </h2>

        <p class="text-3xl font-bold text-cyan-600 mb-6">
            Rp {{ number_format($total) }}
        </p>

        <a href="/payment"
           class="w-full block text-center bg-cyan-600 text-white py-4 rounded-xl">
            Lanjut Pembayaran
        </a>

    </div>

</div>

</body>
</html>