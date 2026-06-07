<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">

<div class="max-w-2xl mx-auto py-10 px-6">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <h1 class="text-2xl font-bold text-slate-800 mb-6">
            Tambah Menu Baru
        </h1>

        <form action="/admin/menu/store"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-5">
                <label class="block font-medium mb-2">
                    Nama Menu
                </label>
                <input
                    type="text"
                    name="nama_menu"
                    class="w-full border rounded-xl p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block font-medium mb-2">
                    Harga
                </label>
                <input
                    type="number"
                    name="harga"
                    class="w-full border rounded-xl p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block font-medium mb-2">
                    Stok
                </label>
                <input
                    type="number"
                    name="stok"
                    class="w-full border rounded-xl p-3"
                    required>
            </div>

            <div class="mb-5">
                <label class="block font-medium mb-2">
                    Deskripsi
                </label>
                <textarea
                    name="deskripsi"
                    class="w-full border rounded-xl p-3"
                    rows="4"
                    required></textarea>
            </div>

            <div class="mb-6">
                <label class="block font-medium mb-2">
                    Upload Gambar
                </label>
                <input
                    type="file"
                    name="gambar"
                    class="w-full border rounded-xl p-3"
                    required>
            </div>

            <div class="flex gap-3">

                <a href="/admin/menu"
                   class="px-5 py-3 bg-gray-200 rounded-xl">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="px-6 py-3 bg-cyan-600 text-white rounded-xl">
                    Simpan Menu
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>