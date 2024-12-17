#ifndef API_HANDLER_H
#define API_HANDLER_H

#include <ArduinoJson.h>
#include <HTTPClient.h>

// Endpoint Laravel API
// const char* serverName = "http://127.0.0.1:8000/api/inventory";
const char* serverName = "http://127.0.0.1:8000/inventory";

// Fungsi untuk membuat JSON payload
String createJsonPayload(
    const String& nama_barang,
    const String& kategori_barang,
    const String& kode_barcode
);

// Fungsi untuk mengirim data ke API
void sendDataToApi(String barcode);

#endif // API_HANDLER_H
