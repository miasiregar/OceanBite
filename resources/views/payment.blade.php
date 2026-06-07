<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto p-8">

    <div class="bg-white p-8 rounded-2xl shadow">

        <h1 class="text-3xl font-bold mb-6">
            Pembayaran
        </h1>

        <p class="text-xl mb-6">
            Total Tagihan:
            <span class="font-bold text-cyan-600">
                Rp {{ number_format($total) }}
            </span>
        </p>

        <form action="/payment/process"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <label class="block mb-2 font-bold">
                Metode Pembayaran
            </label>

            <select
                id="metode_pembayaran"
                name="metode_pembayaran"
                class="w-full border p-3 rounded-xl mb-5">

                <option value="QRIS">QRIS</option>
                <option value="Tunai">Tunai</option>

            </select>

            <!-- QRIS Image -->
            <div id="qris-section" class="mb-6 text-center">

                <p class="font-bold mb-4 text-lg">
                    Scan QRIS untuk pembayaran
                </p>

                <div class="flex justify-center">
                    <img
                        src="{{ asset('images/qris.jpeg') }}"
                        alt="QRIS"
                        class="w-40 h-40 object-cover rounded-2xl border shadow-md">
                </div>

            </div>

            <!-- Upload Bukti -->
            <div id="bukti-section">

                <label class="block mb-2 font-bold">
                    Upload Bukti Pembayaran
                </label>

                <input
                    type="file"
                    name="bukti_bayar"
                    id="bukti_bayar"
                    class="w-full border p-3 rounded-xl mb-6">

            </div>

            <button
                class="w-full bg-cyan-600 text-white py-4 rounded-xl hover:bg-cyan-700 transition">
                Konfirmasi Pembayaran
            </button>

        </form>

    </div>

</div>

<script>
    const metode = document.getElementById('metode_pembayaran');
    const qrisSection = document.getElementById('qris-section');
    const buktiSection = document.getElementById('bukti-section');
    const buktiInput = document.getElementById('bukti_bayar');

    function togglePayment() {
        if (metode.value === 'Tunai') {
            qrisSection.style.display = 'none';
            buktiSection.style.display = 'none';
            buktiInput.removeAttribute('required');
        } else {
            qrisSection.style.display = 'block';
            buktiSection.style.display = 'block';
            buktiInput.setAttribute('required', true);
        }
    }

    togglePayment();

    metode.addEventListener('change', togglePayment);
</script>

</body>
</html>