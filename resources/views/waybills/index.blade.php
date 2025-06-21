<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Scanned Waybills</h1>
                <a href="{{ route('waybills.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Upload New Waybill
                </a>
            </div>

            <!-- Real-time Search -->
            <div class="mb-6">
                <div class="relative">
                    <input
                        type="text"
                        id="search"
                        placeholder="Search by waybill number, receiver name or address..."
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                        autocomplete="off"
                    >
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div id="search-spinner" class="absolute inset-y-0 right-3 items-center hidden">
                        <svg class="animate-spin h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div id="waybills-container">
                @include('waybills.partials.waybills-table')
            </div>

            <!-- Notification Toast -->
            <div id="copy-notification" class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Waybill number copied!</span>
                </div>
            </div>

            <script>
                // Real-time search functionality
                const searchInput = document.getElementById('search');
                const waybillsContainer = document.getElementById('waybills-container');
                const searchSpinner = document.getElementById('search-spinner');
                
                let searchTimeout = null;
                
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchSpinner.classList.remove('hidden');
                    
                    searchTimeout = setTimeout(() => {
                        const searchTerm = this.value.trim();
                        searchWaybills(searchTerm);
                    }, 500); // Debounce for 500ms
                });
                
                async function searchWaybills(term) {
                    try {
                        const response = await fetch(`{{ route('waybills.search') }}?search=${encodeURIComponent(term)}`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        
                        const html = await response.text();
                        waybillsContainer.innerHTML = html;
                    } catch (error) {
                        console.error('Error searching waybills:', error);
                    } finally {
                        searchSpinner.classList.add('hidden');
                    }
                }
                
                // Copy to clipboard functionality
                function copyToClipboard(text) {
                    navigator.clipboard.writeText(text).then(function() {
                        // Show notification
                        const notification = document.getElementById('copy-notification');
                        notification.classList.remove('translate-x-full');
                        
                        // Hide notification after 2 seconds
                        setTimeout(() => {
                            notification.classList.add('translate-x-full');
                        }, 2000);
                    }).catch(function(err) {
                        console.error('Could not copy text: ', err);
                    });
                }

                // Add event delegation for copy buttons in search results
                document.addEventListener('click', function(event) {
                    if (event.target.closest('button[onclick^="copyToClipboard"]')) {
                        // Extract the waybill number from the onclick attribute
                        const onclickAttr = event.target.closest('button').getAttribute('onclick');
                        const match = onclickAttr.match(/copyToClipboard\('(.+?)'\)/);
                        if (match && match[1]) {
                            copyToClipboard(match[1]);
                        }
                        
                        // Prevent the default onclick behavior
                        event.preventDefault();
                    }
                });
            </script>
        </div>
    </div>
</x-app-layout> 