<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Waybill Details</h1>
                <a href="{{ route('waybills.index') }}" class="text-indigo-600 hover:text-indigo-900">
                    &larr; Back to All Waybills
                </a>
            </div>

            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Waybill Details</h1>
                <div class="flex space-x-2">
                    <a href="{{ route('waybills.edit', $waybill) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Edit Information
                    </a>
                    <form action="{{ route('waybills.destroy', $waybill) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="return confirm('Are you sure you want to delete this waybill?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column - Details -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Extracted Information</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Waybill Number</h3>
                            <p class="text-lg font-bold text-gray-900">{{ $waybill->waybill_number }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Receiver Name</h3>
                            <p class="text-lg font-medium text-gray-900">{{ $waybill->receiver_name }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Receiver Address</h3>
                            <p class="text-lg font-medium text-gray-900">{{ $waybill->receiver_address }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Date Scanned</h3>
                            <p class="text-gray-900">{{ $waybill->created_at->format('F j, Y, g:i a') }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Image -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Original Waybill Image</h2>
                    <img src="{{ asset('storage/' . $waybill->image_path) }}" class="w-full rounded-lg border border-gray-200" alt="Waybill Image">
                </div>
            </div>
            
            <!-- Raw OCR Data (Collapsible) -->
            <div class="mt-8">
                <button type="button" class="flex items-center text-sm text-gray-600 focus:outline-none" onclick="toggleRawData()">
                    <svg id="chevron-icon" class="h-5 w-5 text-gray-400 transform transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="ml-2">Show Raw OCR Data</span>
                </button>
                
                <div id="raw-data" class="mt-4 hidden">
                    <div class="bg-gray-50 rounded-md p-4">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Raw OCR Output</h3>
                        <pre class="text-xs text-gray-700 overflow-auto p-4 bg-gray-100 rounded">{{ json_encode($waybill->raw_ocr_data, JSON_PRETTY_PRINT) }}</pre>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h2 class="text-lg font-semibold">Raw OCR Data (Debug)</h2>
                <div class="bg-gray-100 p-4 mt-2 rounded overflow-auto max-h-96 border border-gray-300">
                    <pre class="whitespace-pre-wrap break-words text-sm">{{ $waybill->raw_ocr_data['text'] ?? 'No OCR data available' }}</pre>
                </div>
                <p class="text-sm text-gray-500 mt-2">This data is used for debugging the OCR extraction. If information is not detected correctly, you can use the Edit button to manually correct it.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleRawData() {
            const rawData = document.getElementById('raw-data');
            const chevron = document.getElementById('chevron-icon');
            
            if (rawData.classList.contains('hidden')) {
                rawData.classList.remove('hidden');
                chevron.classList.add('rotate-90');
                chevron.nextElementSibling.textContent = 'Hide Raw OCR Data';
            } else {
                rawData.classList.add('hidden');
                chevron.classList.remove('rotate-90');
                chevron.nextElementSibling.textContent = 'Show Raw OCR Data';
            }
        }
    </script>
</x-app-layout> 