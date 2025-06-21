<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="0;url={{ route('waybills.index') }}">
    <title>Waybill OCR</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

            <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
            </style>
    </head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-center">
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white">Waybill OCR System</h1>
                    </div>

                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden">
                        <p class="text-center text-gray-600 dark:text-gray-400">Redirecting to the application...</p>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('waybills.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Go to Application
                            </a>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
    </body>
</html>
