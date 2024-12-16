#ifndef WIFI_CONFIG_H
#define WIFI_CONFIG_H

#include <WiFi.h>

// Kredensial WiFi
const char* ssid = "Pradita University";     // Ganti dengan SSID WiFi Anda
const char* password = "KampusPradita";      // Ganti dengan password WiFi Anda

// Fungsi untuk menghubungkan ESP32 ke WiFi
void connectToWiFi() {
    WiFi.begin(ssid, password);
    Serial.print("Connecting to WiFi...");
    while (WiFi.status() != WL_CONNECTED) {
        delay(1000);
        Serial.print(".");
    }
    Serial.println("\nConnected to WiFi!");
    Serial.print("IP Address: ");
    Serial.println(WiFi.localIP());
}

#endif
