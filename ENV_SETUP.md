# Environment Setup for Waybill OCR

To properly configure your application, you need to add Tesseract OCR settings to your `.env` file. This guide shows you how to do that.

## Add Tesseract OCR Configuration to .env

Add the following lines to the bottom of your `.env` file:

```
# Tesseract OCR Configuration
# Set the path to your Tesseract executable if it's not in your system PATH
# Windows example:
TESSERACT_PATH="C:\Program Files\Tesseract-OCR\tesseract.exe"
```

Make sure to adjust the path according to your operating system:

### For Windows
```
TESSERACT_PATH="C:\Program Files\Tesseract-OCR\tesseract.exe"
```

### For macOS
```
TESSERACT_PATH="/usr/local/bin/tesseract"
```

### For Linux
```
TESSERACT_PATH="/usr/bin/tesseract"
```

## Testing if Tesseract is in your PATH

If Tesseract is correctly installed and available in your system PATH, you may not need to set the `TESSERACT_PATH` variable. You can check by running:

```
tesseract --version
```

If this command displays the version information, Tesseract is in your PATH.

## If You Get Errors

If you're experiencing issues with OCR after uploading images:

1. Make sure Tesseract OCR is installed on your system (see INSTALLATION.md)
2. Verify the path in your `.env` file is correct
3. Restart your web server after making changes
4. Check the application logs for specific error messages

For detailed installation instructions, please refer to the INSTALLATION.md file. 