import os
import subprocess
import sys

def compress_images():
    print("Attempting to compress images using built-in sips tool...")
    images = [
        'assets/Sam_2.0_Packaging.jpg',
        'assets/Sam_3.0_Close-Up.png',
        'assets/products/SAM_3.0_Hero.png'
    ]
    
    for img in images:
        if os.path.exists(img):
            original_size = os.path.getsize(img)
            # Use sips to resize to max 1600px and compress
            if img.lower().endswith('.jpg'):
                subprocess.run(['sips', '-Z', '1600', '-s', 'formatOptions', '70', img])
            else:
                subprocess.run(['sips', '-Z', '1600', img])
            
            new_size = os.path.getsize(img)
            print(f"Processed {img}: {original_size/1024/1024:.2f} MB -> {new_size/1024/1024:.2f} MB")
        else:
            print(f"{img} does not exist.")

if __name__ == "__main__":
    compress_images()
    print("Done!")
