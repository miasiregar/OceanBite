<!DOCTYPE html>
<html>
<head>
    <title>Register OceanBite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-xl rounded-2xl p-8 w-96">

    <h2 class="text-3xl font-bold text-center text-cyan-600 mb-6">
        Register OceanBite
    </h2>

    <form action="/register" method="POST">
        @csrf

        <input
            type="text"
            name="username"
            placeholder="Username"
            class="w-full border p-3 rounded-lg mb-4"
        >

        <input
            type="text"
            name="nama_lengkap"
            placeholder="Nama Lengkap"
            class="w-full border p-3 rounded-lg mb-4"
        >

        <input
            type="text"
            name="no_hp"
            placeholder="No HP"
            class="w-full border p-3 rounded-lg mb-4"
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            class="w-full border p-3 rounded-lg mb-4"
        >

        <button
            type="submit"
            class="w-full bg-cyan-600 text-white p-3 rounded-lg"
        >
            Register
        </button>
    </form>

    <p class="text-center mt-4">
        Sudah punya akun?
        <a href="/login" class="text-cyan-600 font-bold">
            Login
        </a>
    </p>

</div>

</body>
</html>