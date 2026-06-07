<!DOCTYPE html>
<html>
<head>
    <title>Login OceanBite</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-xl rounded-2xl p-8 w-96">

    <h2 class="text-3xl font-bold text-center text-cyan-600 mb-6">
        OceanBite Login
    </h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <input
            type="text"
            name="username"
            placeholder="Username"
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
            Login
        </button>
    </form>

    <p class="text-center mt-4">
        Belum punya akun?
        <a href="/register" class="text-cyan-600 font-bold">
            Register
        </a>
    </p>

</div>

</body>
</html>