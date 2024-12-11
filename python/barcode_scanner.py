import cv2
import requests
from pyzbar.pyzbar import decode  # For decoding both QR codes and barcodes

# Initialize camera
cap = cv2.VideoCapture(0)

if not cap.isOpened():
    print("Error: Unable to access the camera.")
    exit()

# API endpoint URL
api_endpoint = "http://127.0.0.1:8000/api/inventory"

print("Press 'q' to quit.")

while True:
    # Capture a frame from the camera
    ret, frame = cap.read()
    
    if not ret:
        print("Failed to grab frame. Exiting...")
        break

    # Decode QR Code or Barcode
    detected_data = decode(frame)
    for obj in detected_data:
        # Extract the decoded data
        data = obj.data.decode("utf-8")
        print(f"Detected: {data}")

        # Prepare the data payload for API request
        payload = {"barcode": data}

        try:
            # Send HTTP POST request to Laravel API
            response = requests.post(api_endpoint, json=payload, timeout=10)
            
            if response.status_code == 200:
                print(f"Data sent successfully: {response.json()}")
            else:
                print(f"Failed to send data. Status code: {response.status_code}, Response: {response.text}")
        except Exception as e:
            print(f"Error occurred while sending data: {e}")

    # Display the current frame
    cv2.imshow("QR Code and Barcode Scanner", frame)

    # Exit on pressing 'q'
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Release the camera and close OpenCV windows
cap.release()
cv2.destroyAllWindows()
