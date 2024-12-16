# IoT2-Webapp-QR-Code-Scanner

![IoT QR Code Scanner Web App](/images/iot-qr-code-barcode-scanner-web-application.png)
Merupakan Aplikasi Scanner QR Code/Barcode berbasis Web menggunakan IoT.

## Images

Inilah Tampilan Sederhana dari Aplikasi Web Monitoring Sensor Suhu :
\
\
![IoT QR Code Scanner Web App](./images/lorem-ipsum.jpg)

## Description

**1. [Project IoT QR Code Scanner](./realtime-temperature-sensor-gui)**

Merupakan Project Aplikasi Monitoring Sensor Suhu Sederhana yang terdiri dari:

- Web (HTML, CSS, JavaScript)
- CSS : Bootstrap
- Framework : Laravel
- Python (OpenCV)
- Arduino

**2. Folder Structure**

Struktur Folder :

```
📁IoT2-WWebapp-QR-Code-Scanner/
    ├── 📁arduino/
    │   └── esp32-cam-barcode-scanner.ino              # File kode Arduino ESP32 CAM
    ├── 📁barcode-scanner/                             # Backend Laravel untuk API dan Dashboard
    │   ├── 📁app/
    │   │   ├── 📁Http/
    │   │   │   ├── 📁Controllers/
    │   │   │   │   ├── 📁API/
    │   │   │   │   │   ├── InventoryApiController.php # Controller untuk API
    │   │   │   │   └── 📁Web/
    │   │   │   │       └── InventoryController.php    # Controller untuk halaman produk
    │   │   ├── 📁Models/
    │   │   │   └── Inventory.php                      # Model untuk tabel inventory
    │   │   ├── 📁Providers/
    │   │   └── 📁Services/
    │   ├── 📁config/
    │   ├── 📁database/
    │   │   ├── 📁factories/
    │   │   ├── 📁migrations/
    │   │   │   └── 2024_12_11_021910_create_inventory_table.php # Migration tabel inventory
    │   │   └── 📁seeders/
    │   │       └── InventorySeeder.php                # Seeder untuk data dummy inventory
    │   ├── 📁public/
    │   │   ├── 📁css/
    │   │   │   └── style.css                          # File CSS
    │   │   └── 📁js/
    │   │       └── script.js                          # File JavaScript
    │   ├── 📁resources/
    │   │   └── 📁views/
    │   │       ├── 📁layouts/
    │   │       │   └── main.blade.php                 # Layout utama untuk Laravel Blade
    │   │       ├── partials/
    │   │       │   ├── navbar.blade.php               # Layout Navbar untuk Laravel Blade
    │   │       │   └── sidenav.blade.php              # Layout Side Navigation untuk Laravel Blade
    │   │       ├── dashboard.blade.php                # Halaman dashboard
    │   │       ├── products.blade.php                 # Halaman untuk data produk
    │   │       ├── edit_product.blade.php             # Halaman edit produk
    │   │       ├── update_product.blade.php           # Halaman update produk
    │   │       └── delete_product.blade.php           # Halaman hapus produk (destroy)
    │   ├── 📁routes/
    │   │   ├── api.php                                # Endpoint untuk API
    │   │   └── web.php                                # Route untuk halaman web
    │   ├── 📁storage/
    │   │── 📁tests/
    │   └── .env
    ├── 📁python-opencv/                               # Program Python OpenCV
    │   └── barcode_scanner.py                         # Script Python untuk membaca QR Code
    └── README.md                                      # Panduan proyek keseluruhan
```

**3. [Project Realtime Temperature Sensor GUI Node.js](./realtime-temperature-sensor-gui-node)**

Merupakan Lanjutan dari Project Aplikasi Monitoring Sensor Suhu Sederhana (yang di Nomor 1) yang menggunakan Framework Node.js. Untuk Project ini, melakukan Update Data secara Realtime menggunakan WebSockets, dan Server-nya menggunakan JavaScript.

Steps :

1. Persiapan Project

Pertama, buatlah direktori baru untuk proyek Anda dan masuk ke dalamnya :

> mkdir realtime-temperature-sensor
> cd realtime-temperature-sensor

Kedua, Inisialisasikan proyek Node.js dan buat file package.json dengan menjalankan perintah :

> npm init -y

2. Install Package yang Diperlukan

> npm install express http socket.io

**4. [Project Realtime Temperature Sensor GUI Laravel](./realtime-temperature-sensor-gui-laravel)**

Merupakan Lanjutan dari Project Aplikasi Monitoring Sensor Suhu Sederhana (yang di Nomor 1) yang menggunakan Framework Laravel. Untuk Project ini, melakukan Update Data secara Realtime menggunakan WebSockets, dan Server-nya menggunakan PHP.

Untuk melihat Kode Program sebelumnya, silakan [lihat di sini](https://github.com/inzaghipa1709/UTS-Webdev).
