<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Upload Waybill Image</h1>
                <p class="mt-1 text-sm text-gray-600">Upload a J&T waybill image to extract information automatically.</p>
            </div>

            <form method="POST" action="{{ route('waybills.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="mb-6">
                    <label for="waybill_image" class="block text-sm font-medium text-gray-700 mb-2">Waybill Image (JPG, PNG)</label>
                    
                    @error('waybill_image')
                        <p class="text-sm text-red-600 mb-2">{{ $message }}</p>
                    @enderror
                    
                    <div class="flex items-center justify-center">
                        <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1z"></path>
                                <path d="M11 11h3l-4-4-4 4h3v3h2v-3z"></path>
                            </svg>
                            <span class="mt-2 text-base leading-normal">Select a file</span>
                            <input type="file" class="hidden" name="waybill_image" id="waybill_image" accept="image/*" onchange="showPreview(this)"/>
                        </label>
                    </div>
                    
                    <div id="image-preview" class="mt-4 hidden">
                        <div class="flex flex-col items-center">
                            <img id="preview-img" class="max-h-64 rounded-lg shadow-sm" src="" alt="Preview" />
                            <button type="button" onclick="removeImage()" class="mt-3 px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none">
                                Change Image
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-1 text-center text-sm text-gray-500">
                        PNG, JPG up to 2MB
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('waybills.index') }}" class="mr-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Upload & Process
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPreview(input) {
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function removeImage() {
            const fileInput = document.getElementById('waybill_image');
            const preview = document.getElementById('image-preview');
            
            fileInput.value = '';
            preview.classList.add('hidden');
        }
    </script>
</x-app-layout> 