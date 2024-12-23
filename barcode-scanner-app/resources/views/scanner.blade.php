@extends('layouts.main')

@section('container')
<div class="container">
    <h1>{{ $title }}</h1>
    <p>Scan the barcode to add data to the database.</p>
    
    <div id="scanner">
        {{-- <img id="cameraStream" src="http://192.168.115.64/cam-hi.jpg" alt="ESP32-CAM Stream" width="800"> --}}
        <img id="cameraStream" src="http://192.168.1.8/cam-hi.jpg" alt="ESP32-CAM Stream" width="800">
    </div>
</div>

<p>Hasil Scan:</p>
<p id="scan-result">Menunggu scan...</p>

<script>
    // API Endpoint Laravel untuk menyimpan data hasil scan
    const apiUrl = "{{ route('api.store.barcode') }}";

    // Fungsi untuk mengirim hasil scan ke server
    async function sendScanResult(data) {
        try {
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ kode_barcode: data })
            });

            if (!response.ok) {
                throw new Error("Gagal mengirim data ke server.");
            }
            const result = await response.json();
            console.log("Berhasil:", result);
        } catch (error) {
            console.error("Error:", error);
        }
    }

    // Refresh gambar live stream setiap 100 ms untuk simulasi video
    const cameraStream = document.getElementById("cameraStream");
    setInterval(() => {
        cameraStream.src = "http://192.168.1.8/cam-hi.jpg?" + new Date().getTime(); // Tambahkan timestamp untuk menghindari caching
    }, 100);

    // Simulasi hasil deteksi barcode (di ESP32)
    let previousResult = null;

    setInterval(async () => {
        const simulatedBarcode = "1234567890123"; // Ganti dengan kode dari ESP32-CAM
        if (previousResult !== simulatedBarcode) {
            document.getElementById('scan-result').innerText = simulatedBarcode;
            await sendScanResult(simulatedBarcode);
            previousResult = simulatedBarcode;
        }
    }, 2000); // Periksa setiap 2 detik
</script>
@endsection
