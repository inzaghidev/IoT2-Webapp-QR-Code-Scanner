#include "ApiHandler.h"

String createJsonPayload(
    const String& nama_barang,
    const String& kategori_barang,
    const String& kode_barcode,
    const String& img_barcode,
    int quantity,
    int harga_satuan
) {
    // Membuat dokumen JSON
    StaticJsonDocument<200> doc;
    doc["nama_barang"] = nama_barang;
    doc["kategori_barang"] = kategori_barang;
    doc["kode_barcode"] = kode_barcode;
    doc["img_barcode"] = img_barcode;
    doc["quantity"] = quantity;
    doc["harga_satuan"] = harga_satuan;

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
