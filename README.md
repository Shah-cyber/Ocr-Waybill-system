# Waybill OCR System

A Laravel-based system for extracting information from J&T waybill images using OCR (Optical Character Recognition).

## Features

- Upload J&T waybill images
- Extract waybill numbers and recipient names automatically
- Store and display extracted data
- View scanned waybills history

## Tech Stack

- **Backend**: Laravel
- **Local Server**: Laragon
- **Database**: MySQL
- **Frontend Styling**: Tailwind CSS
- **OCR Engine**: Tesseract OCR
- **Image Processing**: Imagick

## Requirements

- PHP 8.0+
- Composer
- MySQL
- [Tesseract OCR](https://github.com/tesseract-ocr/tesseract) installed on your system
- ImageMagick with PHP extension

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/waybill-ocr.git
cd waybill-ocr
```

2. Install PHP dependencies:

```bash
composer install
```

3. Set up your environment file:

```bash
cp .env.example .env
```

4. Configure your database in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=waybill-ocr
DB_USERNAME=root
DB_PASSWORD=
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Run migrations:

```bash
php artisan migrate
```

7. Create symbolic link for storage:

```bash
php artisan storage:link
```

8. Install Tesseract OCR (if not already installed):

   - **Windows**: Download and install from [UB Mannheim](https://github.com/UB-Mannheim/tesseract/wiki)
   - **MacOS**: `brew install tesseract`
   - **Ubuntu**: `sudo apt install tesseract-ocr`

   Make sure the Tesseract executable is in your system PATH.

9. Start the development server:

```bash
php artisan serve
```

## Usage

1. Navigate to the application in your browser (typically http://localhost:8000)
2. Click on "Upload New" to upload a J&T waybill image
3. The system will process the image and extract the waybill number and recipient name
4. View the extracted information and stored waybills

## Notes for Scanning

- For best results, ensure good lighting and focus when photographing waybills
- Crop the image to focus on the waybill area
- Make sure the waybill number and recipient name are clearly visible

## License

MIT
