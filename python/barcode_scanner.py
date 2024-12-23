import cv2
import numpy as np
import pyzbar.pyzbar as pyzbar
import urllib.request
import requests

# URL ESP32-CAM (Ganti IP sesuai dengan alamat ESP32-CAM Anda)
# Pastikan URL ini sesuai dengan alamat IP ESP32 yang sudah terhubung ke jaringan
# esp32_cam_url = "http://192.168.115.64/cam-hi.jpg"  # IP ESP32 Kampus
esp32_cam_url = "http://192.168.1.8/cam-hi.jpg"  # IP ESP32 Rumah

# API Endpoint Laravel
api_endpoint = "http://127.0.0.1:8000/inventory"  # Ganti dengan URL API Laravel Anda

# Font untuk menampilkan teks
font = cv2.FONT_HERSHEY_PLAIN

# Variabel untuk mencegah pengulangan data
prev_data = ""

while True:
    try:
        # Ambil gambar dari ESP32-CAM
        img_resp = urllib.request.urlopen(esp32_cam_url)
        imgnp = np.array(bytearray(img_resp.read()), dtype=np.uint8)
        frame = cv2.imdecode(imgnp, -1)

        # Dekode QR Code atau Barcode
        decoded_objects = pyzbar.decode(frame)
        for obj in decoded_objects:
            current_data = obj.data.decode("utf-8")

            if current_data != prev_data:  # Hindari duplikasi data
                print(f"Detected: {current_data}")

                # Kirim data ke API Laravel
                payload = {
                    "kode_barcode": current_data,
                    "nama_barang": "Contoh Barang",  # Anda bisa mengganti nama barang sesuai kebutuhan
                    "kategori_barang": "Kategori Baru"  # Anda bisa mengganti kategori barang sesuai kebutuhan
                }

                # Pastikan request ke API Laravel menggunakan header yang tepat
                headers = {
                    'Content-Type': 'application/json',
                }

                try:
                    response = requests.post(api_endpoint, json=payload, headers=headers)
                    if response.status_code == 200 or response.status_code == 201:
                        print("Data berhasil dikirim ke server.")
                    else:
                        print(f"Error saat mengirim data: {response.text}")
                except Exception as e:
                    print(f"Gagal mengirim data ke server: {e}")

                prev_data = current_data

            # Tampilkan teks di layar
            cv2.putText(frame, current_data, (50, 50), font, 2, (0, 255, 0), 3)

        # Tampilkan video di jendela OpenCV
        cv2.imshow("ESP32-CAM QR Code Scanner", frame)

        # Tekan 'q' untuk keluar
        if cv2.waitKey(1) & 0xFF == ord('q'):
            break

    except Exception as e:
        print(f"Error: {e}")
        break

# Menutup semua jendela
cv2.destroyAllWindows()