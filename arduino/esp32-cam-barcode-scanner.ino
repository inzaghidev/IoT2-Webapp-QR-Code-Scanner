#include <WebServer.h>
#include <WiFi.h>
#include <esp32cam.h>

// Kredensial WiFi
const char* WIFI_SSID = "Pradita University";
const char* WIFI_PASS = "KampusPradita";

WebServer server(80);

// Resolusi gambar
static auto hiRes = esp32cam::Resolution::find(800, 600);

void serveJpg()
{
  auto frame = esp32cam::capture();
  if (frame == nullptr) {
    Serial.println("CAPTURE FAIL");
    server.send(503, "", "");
    return;
  }

  Serial.printf("CAPTURE OK %dx%d %db\n", frame->getWidth(), frame->getHeight(),
                static_cast<int>(frame->size()));
  server.setContentLength(frame->size());
  server.send(200, "image/jpeg");
  WiFiClient client = server.client();
  frame->writeTo(client);
}

void setup() {
  Serial.begin(115200);
  Serial.println();

  // Konfigurasi kamera
  using namespace esp32cam;
  Config cfg;
  cfg.setPins(pins::AiThinker);
  cfg.setResolution(hiRes);
  cfg.setBufferCount(2);
  cfg.setJpeg(80);

  bool ok = Camera.begin(cfg);
  Serial.println(ok ? "CAMERA OK" : "CAMERA FAIL");

  // Hubungkan ke WiFi
  WiFi.persistent(false);
  WiFi.mode(WIFI_STA);
  WiFi.begin(WIFI_SSID, WIFI_PASS);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("\nWiFi connected!");
  Serial.print("ESP32-CAM URL: http://");
  Serial.println(WiFi.localIP());

  // Endpoint gambar
  server.on("/cam-hi.jpg", serveJpg);
  server.begin();
}

void loop() {
  server.handleClient();
}