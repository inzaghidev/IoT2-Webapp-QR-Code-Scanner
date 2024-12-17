#include "ApiHandler.h"

String createJsonPayload(
    const String& nama_barang,
    const String& kategori_barang,
    const String& kode_barcode
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

void sendDataToApi(String barcode) {
    HTTPClient http;

    // Mulai koneksi HTTP ke API
    http.begin(serverName);
    http.addHeader("Content-Type", "application/json");

    // Membuat JSON payload
    String payload = createJsonPayload("Barang ESP32", "Otomatis", barcode);
    Serial.println("Payload: " + payload);

    // Kirim data ke API
    int httpResponseCode = http.POST(payload);

    if (httpResponseCode > 0) {
        String response = http.getString();
        Serial.println("Response dari server: " + response);
    } else {
        Serial.print("Error saat mengirim data. Kode: ");
        Serial.println(httpResponseCode);
    }

    http.end(); // Akhiri koneksi HTTP
}