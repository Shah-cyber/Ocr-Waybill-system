# Installing Tesseract OCR

This guide will help you install Tesseract OCR on your system, which is required for the Waybill OCR application to work properly.

## Windows

1. Download the Tesseract installer from [UB Mannheim](https://github.com/UB-Mannheim/tesseract/wiki)
   - Choose the latest version (e.g., tesseract-ocr-w64-setup-5.3.1.20230401.exe for 64-bit)

2. Run the installer and follow these steps:
   - Accept the license agreement
   - Choose the installation location (default is fine)
   - Select components to install:
     - Make sure "Tesseract OCR" is selected
     - Optionally select additional language data (English is installed by default)
   - **Important**: Check "Add Tesseract to the system PATH" option

3. Complete the installation

4. Verify installation:
   - Open Command Prompt
   - Type `tesseract --version` and press Enter
   - You should see version information if installed correctly

5. Update your `.env` file:
   - Add `TESSERACT_PATH=C:\Program Files\Tesseract-OCR\tesseract.exe` (adjust the path if you installed to a different location)

## macOS

Using Homebrew:

1. Install Homebrew if you haven't already:
   ```
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```

2. Install Tesseract:
   ```
   brew install tesseract
   ```

3. Verify installation:
   ```
   tesseract --version
   ```

4. Update your `.env` file:
   ```
   TESSERACT_PATH=/usr/local/bin/tesseract
   ```

## Ubuntu/Debian

1. Update package lists:
   ```
   sudo apt update
   ```

2. Install Tesseract OCR:
   ```
   sudo apt install -y tesseract-ocr
   ```

3. Verify installation:
   ```
   tesseract --version
   ```

4. Update your `.env` file:
   ```
   TESSERACT_PATH=/usr/bin/tesseract
   ```

## After Installation

1. Make sure to restart your application server after installing Tesseract OCR
2. If you're still having issues, make sure the user running the web server has permissions to execute the Tesseract binary

## Troubleshooting

If you get an error like "Command 'tesseract' not found" or similar:

1. Make sure Tesseract is installed correctly
2. Verify the binary is in your system PATH
3. Try specifying the full path to the Tesseract binary in your environment configuration

For Windows users:
- Check if the Tesseract installation directory (e.g., `C:\Program Files\Tesseract-OCR`) is in your system PATH
- You may need to restart your computer after installing for the PATH changes to take effect 