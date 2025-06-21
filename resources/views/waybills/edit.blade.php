<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Edit Waybill Information</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <form method="POST" action="{{ route('waybills.update', $waybill) }}" class="space-y-4">
                                @csrf
                                @method('PUT')
                                
                                <div>
                                    <label for="waybill_number" class="block text-sm font-medium text-gray-700">Waybill Number</label>
                                    <input type="text" name="waybill_number" id="waybill_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ $waybill->waybill_number }}" required>
                                </div>
                                
                                <div>
                                    <label for="receiver_name" class="block text-sm font-medium text-gray-700">Receiver Name</label>
                                    <input type="text" name="receiver_name" id="receiver_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ $waybill->receiver_name }}" required>
                                </div>
                                
                                <div>
                                    <label for="receiver_address" class="block text-sm font-medium text-gray-700">Receiver Address</label>
                                    <textarea name="receiver_address" id="receiver_address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $waybill->receiver_address }}</textarea>
                                </div>
                                
                                <div class="flex justify-between mt-6">
                                    <a href="{{ route('waybills.show', $waybill) }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Cancel
                                    </a>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Update Information
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Original Scan</h2>
                            <img src="{{ asset('storage/' . $waybill->image_path) }}" alt="Scanned waybill" class="max-w-full h-auto rounded border border-gray-200">
                            
                            <div class="mt-4">
                                <h3 class="font-medium text-gray-700">Raw OCR Data</h3>
                                <div class="bg-gray-100 p-2 mt-1 text-sm rounded overflow-auto max-h-48">
                                    <pre>{{ $waybill->raw_ocr_data['text'] ?? 'No OCR data available' }}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 