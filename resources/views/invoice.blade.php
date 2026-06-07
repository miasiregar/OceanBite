<!DOCTYPE html>
<html>
<head>
    <title>Nota Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

<div class="max-w-2xl mx-auto py-8 px-4">

    <div class="bg-white rounded-2xl shadow-md p-6">

        <!-- Header -->
        <div class="border-b pb-5 mb-6">
            <h1 class="text-2xl font-bold text-slate-800">
                Nota Pembayaran
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Detail pesanan dan informasi pembayaran
            </p>
        </div>

        <!-- Info Pesanan -->
        <div class="space-y-3 mb-6 text-sm">

            <div class="flex justify-between">
                <span class="font-medium text-gray-600">
                    ID Pesanan
                </span>

                <span class="font-semibold text-slate-800">
                    #{{ $pesanan->id_pesanan }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium text-gray-600">
                    Status
                </span>

                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                    {{ $pesanan->status_pesanan }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium text-gray-600">
                    Metode Pembayaran
                </span>

                <span class="font-semibold text-slate-800">
                    {{ $pembayaran->metode_pembayaran }}
                </span>
            </div>

        </div>

        <!-- NOTA TUNAI -->
        @if($pembayaran->metode_pembayaran == 'Tunai')

        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6">

            <h2 class="font-semibold text-amber-700 mb-2">
                Pembayaran Tunai Dipilih
            </h2>

            <p class="text-sm text-gray-700 leading-relaxed">
                Pesananmu berhasil dibuat dan sedang kami proses.
                Silakan lakukan pembayaran langsung di kasir saat mengambil pesanan.
            </p>

            <p class="text-sm text-gray-700 mt-2">
                Tunjukkan nota ini kepada kasir sebagai bukti pemesanan.
            </p>

        </div>

        @endif

        <!-- NOTA QRIS -->
        @if($pembayaran->metode_pembayaran == 'QRIS')

        <div class="bg-cyan-50 border border-cyan-200 rounded-xl p-4 mb-6">

            <h2 class="font-semibold text-cyan-700 mb-2">
                Pembayaran QRIS Berhasil Dikirim
            </h2>

            <p class="text-sm text-gray-700 leading-relaxed">
                Bukti pembayaran telah berhasil diunggah dan sedang menunggu proses verifikasi admin.
            </p>

            <p class="text-sm text-gray-700 mt-2">
                Setelah pembayaran diverifikasi, pesananmu akan segera diproses.
            </p>

        </div>

        @endif

        <!-- Detail Pesanan -->
        <div class="mb-6">

            <h2 class="text-lg font-semibold text-slate-800 mb-4">
                Detail Pesanan
            </h2>

            @foreach($detail as $item)

            <div class="flex justify-between items-center py-3 border-b">

                <div>
                    <h3 class="font-semibold text-slate-800 text-base">
                        {{ $item->nama_menu }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        Qty: {{ $item->jumlah }}
                    </p>
                </div>

                <div class="font-semibold text-cyan-600 text-base">
                    Rp {{ number_format($item->subtotal) }}
                </div>

            </div>

            @endforeach

        </div>

        <!-- Total -->
        <div class="border-t pt-5 mb-6">

            <div class="flex justify-between items-center">
                <span class="text-lg font-semibold text-slate-800">
                    Total Pembayaran
                </span>

                <span class="text-2xl font-bold text-cyan-600">
                    Rp {{ number_format($pesanan->total_harga) }}
                </span>
            </div>

        </div>

        <!-- Button -->
        <a href="/dashboard"
           class="block w-full text-center bg-cyan-600 text-white py-3 rounded-xl font-medium hover:bg-cyan-700 transition">
            Selesai
        </a>

    </div>

</div>

</body>
</html>