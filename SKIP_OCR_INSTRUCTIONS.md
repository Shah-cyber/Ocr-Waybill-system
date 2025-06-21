# Skip OCR Processing

If you don't want to install Tesseract OCR or are having issues with it, you can configure the application to skip OCR processing entirely and just upload and store the waybill images.

## How to Skip OCR:

1. Edit your `.env` file in the root directory of your project

2. Add the following line:
   ```
   SKIP_OCR=true
   ```

3. Save the file and restart your Laravel application

## What to Expect:

- Images will be uploaded and stored as usual
- No OCR text extraction will be attempted
- Waybill number and receiver name will be marked as "Manual Entry Required"
- You will not see OCR errors

## To Re-enable OCR:

If you install Tesseract OCR later and want to enable OCR functionality:

1. Remove the `SKIP_OCR=true` line from your `.env` file, or set it to `false`:
   ```
   SKIP_OCR=false
   ```

2. Make sure Tesseract is properly installed with this command:
   ```
   tesseract --version
   ```

3. If Tesseract is in a non-standard location, set the path in your `.env` file:
   ```
   TESSERACT_PATH="C:\Program Files\Tesseract-OCR\tesseract.exe"
   ```

## Recommended Option:

We recommend installing Tesseract OCR if possible, as it provides the full functionality of automatically extracting waybill numbers and receiver names from your images. Please refer to the INSTALLATION.md file for detailed instructions on how to install Tesseract OCR. 