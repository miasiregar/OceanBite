<!DOCTYPE html>
<html>
<head>
    <title>Admin OceanBite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-slate-900 text-white p-6">

        <h1 class="text-3xl font-bold mb-10">
            OceanBite Admin
        </h1>

        <div class="space-y-4">

            <a href="/admin"
               class="block px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700">
                Dashboard
            </a>

            <a href="/admin/users"
               class="block px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700">
                Data User
            </a>

            <a href="/admin/menu"
               class="block px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700">
                Kelola Menu
            </a>

            <a href="/admin/orders"
               class="block px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700">
                Data Pesanan
            </a>

            <a href="/logout"
               class="block px-4 py-3 rounded-xl bg-red-500 hover:bg-red-600">
                Logout
            </a>

        </div>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-10">

        <!-- Dashboard -->
        @if($page == 'dashboard')

        <h2 class="text-4xl font-bold mb-8">
            Dashboard Admin
        </h2>

        <div class="grid grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">
                    Total User
                </p>

                <h3 class="text-4xl font-bold mt-3">
                    {{ $users }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">
                    Total Menu
                </p>

                <h3 class="text-4xl font-bold mt-3">
                    {{ $menu }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">
                    Total Pesanan
                </p>

                <h3 class="text-4xl font-bold mt-3">
                    {{ $orders }}
                </h3>
            </div>

        </div>

        @endif


        <!-- Users -->
        @if($page == 'users')

        <h2 class="text-4xl font-bold mb-8">
            Data User Register
        </h2>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-200">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Username</th>
                        <th class="p-4 text-left">Nama</th>
                        <th class="p-4 text-left">No HP</th>
                        <th class="p-4 text-left">Role</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)

                    <tr class="border-b">

                        <td class="p-4">
                            {{ $user->id_user }}
                        </td>

                        <td class="p-4">
                            {{ $user->username }}
                        </td>

                        <td class="p-4">
                            {{ $user->nama_lengkap }}
                        </td>

                        <td class="p-4">
                            {{ $user->no_hp }}
                        </td>

                        <td class="p-4">
                            {{ $user->role }}
                        </td>

                    </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

        @endif


        <!-- Menu -->
        @if($page == 'menu')

        <div class="flex justify-between items-center mb-8">

            <h2 class="text-4xl font-bold">
                Kelola Menu
            </h2>

            <a href="/admin/menu/create"
               class="bg-cyan-600 text-white px-6 py-3 rounded-xl">
                Tambah Menu
            </a>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-200">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Nama Menu</th>
                        <th class="p-4 text-left">Harga</th>
                        <th class="p-4 text-left">Stok</th>
                        <th class="p-4 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($menu as $item)

                    <tr class="border-b">

                        <td class="p-4">
                            {{ $item->id_menu }}
                        </td>

                        <td class="p-4">
                            {{ $item->nama_menu }}
                        </td>

                        <td class="p-4">
                            Rp {{ number_format($item->harga) }}
                        </td>

                        <td class="p-4">
                            {{ $item->stok }}
                        </td>

                        <td class="p-4 flex gap-2">

                            <a href="/admin/menu/edit/{{ $item->id_menu }}"
                               class="bg-yellow-400 px-4 py-2 rounded-lg">
                                Edit
                            </a>

                            <a href="/admin/menu/delete/{{ $item->id_menu }}"
                               class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                Delete
                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @endif


        <!-- Orders -->
        @if($page == 'orders')

        <h2 class="text-4xl font-bold mb-8">
            Data Pesanan
        </h2>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-200">
                    <tr>
                        <th class="p-4 text-left">ID Pesanan</th>
                        <th class="p-4 text-left">ID User</th>
                        <th class="p-4 text-left">Tanggal</th>
                        <th class="p-4 text-left">Total</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Pembayaran</th>
                        <th class="p-4 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($orders as $order)

                    <tr class="border-b">

                        <td class="p-4">
                            {{ $order->id_pesanan }}
                        </td>

                        <td class="p-4">
                            {{ $order->id_user }}
                        </td>

                        <td class="p-4">
                            {{ $order->tanggal_pesan }}
                        </td>

                        <td class="p-4">
                            Rp {{ number_format($order->total_harga) }}
                        </td>

                        <!-- Status Pesanan -->
                        <td class="p-4">
                            {{ $order->status_pesanan }}
                        </td>

                        <!-- Status Pembayaran -->
                        <td class="p-4">

                            @if($order->metode_pembayaran == 'QRIS')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-lg font-semibold">
                                    Sudah Bayar
                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg font-semibold">
                                    Bayar di Kasir
                                </span>

                            @endif

                        </td>

                        <!-- Aksi -->
                        <td class="p-4">

                            @if($order->status_pesanan == 'pending')

                                <a href="/admin/orders/confirm/{{ $order->id_pesanan }}"
                                   class="bg-green-500 text-white px-4 py-2 rounded-lg">
                                    Konfirmasi
                                </a>

                            @else

                                <span class="text-green-600 font-bold">
                                    Selesai
                                </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @endif

    </main>

</div>

</body>
</html>
