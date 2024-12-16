#include "WiFiConfig.h"
#include "ApiHandler.h"
#include "CameraConfig.h" // Tambahkan ini untuk mengakses fungsi initCamera()
#include <ArduinoJson.h>

void setup() {
    Serial.begin(115200);

    // Hubungkan ke WiFi
    connectToWiFi();

    // Inisialisasi kamera
    if (!initCamera()) { // Pastikan fungsi initCamera dikenali
        Serial.println("Gagal menginisialisasi kamera!");
        while (true); // Hentikan program jika kamera gagal diinisialisasi
    }

    Serial.println("Kamera berhasil diinisialisasi!");
}

void loop() {
    // Simulasi QR Code hasil pemindaian
    String scannedQRCode = "1234567890123"; // Ganti dengan data QR Code yang nyata

    // Data JSON untuk dikirim ke API
    String jsonData = createJsonPayload(
        "Contoh Barang",
        "Contoh Kategori",
        scannedQRCode,
        "barcode_image.png",
        10,
        1500
    );

    // Kirim data ke API Laravel
    sendDataToApi(jsonData);

    delay(10000); // Tunggu 10 detik sebelum mengirim ulang
}
