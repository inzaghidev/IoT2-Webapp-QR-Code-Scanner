#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

// WiFi credentials
const char* ssid = "Pradita University";
const char* password = "KampusPradita";

// API endpoint Laravel
const char* serverName = "http://barcode-scanner-app/api/inventory"; // Ganti dengan URL API Laravel Anda

void setup() {
  Serial.begin(115200);

  // Connect to WiFi
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi...");
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println();
  Serial.println("Connected to WiFi");
}

void loop() {
  // Simulasi QR Code yang sudah dipindai (Ganti dengan hasil pemindaian QR Code menggunakan library tambahan)
  String scannedQRCode = "1234567890123"; // Contoh kode QR Code hasil pemindaian

  // Kirim data QR Code ke server Laravel
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;

    // Set endpoint
    http.begin(serverName);

    // Set HTTP headers
    http.addHeader("Content-Type", "application/json");

    // Data JSON yang akan dikirim
    StaticJsonDocument<200> doc;
    doc["nama_barang"] = "Contoh Barang";
    doc["kategori_barang"] = "Contoh Kategori";
    doc["kode_barcode"] = scannedQRCode;
    doc["img_barcode"] = "barcode_image.png";
    doc["quantity"] = 10;
    doc["harga_satuan"] = 1500;

    String jsonString;
    serializeJson(doc, jsonString);

    // Kirim data POST request
    int httpResponseCode = http.POST(jsonString);

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

  delay(10000); // Delay 10 detik sebelum pengiriman berikutnya
}