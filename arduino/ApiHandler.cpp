#include "ApiHandler.h"
#include <WiFi.h> // Tambahkan ini untuk menggunakan fungsi WiFi

String createJsonPayload(
    const String& nama_barang,
    const String& kategori_barang,
    const String& kode_barcode,
) {
    // Membuat dokumen JSON
    StaticJsonDocument<200> doc;
    doc["nama_barang"] = nama_barang;
    doc["kategori_barang"] = kategori_barang;
    doc["kode_barcode"] = kode_barcode;

    // Serialize JSON ke String
    String jsonString;
    serializeJson(doc, jsonString);
    return jsonString;
}

void sendDataToApi(const String& jsonData) {
    if (WiFi.status() == WL_CONNECTED) {
        HTTPClient http;

        // Konfigurasi HTTP POST
        http.begin(serverName);
        http.addHeader("Content-Type", "application/json");

        // Kirim data JSON melalui POST request
        int httpResponseCode = http.POST(jsonData);

        if (httpResponseCode > 0) {
            String response = http.getString();
            Serial.println("Data berhasil dikirim!");
            Serial.println("Response:");
            Serial.println(response);
        } else {
            Serial.print("Error saat mengirim data: ");
            Serial.println(httpResponseCode);
        }

        http.end();
    } else {
        Serial.println("WiFi tidak terhubung.");
    }
}
