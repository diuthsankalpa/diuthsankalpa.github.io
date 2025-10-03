import qrcode
import os

# --- Configuration ---
# 1. YOUR LIVE WEBSITE URL - THIS HAS BEEN UPDATED
data_to_encode = "https://diuthsankalpa.github.io/"

# 2. Output file name
output_filename = "diuth-qr-code.png"

# --- QR Code Generation ---
qr = qrcode.QRCode(
    version=1,
    error_correction=qrcode.constants.ERROR_CORRECT_H, 
    box_size=10, 
    border=4,
)

qr.add_data(data_to_encode)
qr.make(fit=True)

# Create the image
img = qr.make_image(fill_color="black", back_color="white")

# Save the image file
try:
    img.save(output_filename)
    full_path = os.path.abspath(output_filename)
    print(f"✅ Success! QR code saved as {output_filename}")
    print(f"File location: {full_path}")
except Exception as e:
    print(f"❌ Error saving image: {e}")
