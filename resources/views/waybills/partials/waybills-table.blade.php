@if($waybills->isEmpty())
    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-yellow-700">
                    No waybills found matching your search.
                </p>
            </div>
        </div>
    </div>
@else
    <table class="min-w-full bg-white">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">NO.</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">WAYBILL NUMBER</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">RECEIVER NAME</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">RECEIVER ADDRESS</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">DATE SCANNED</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">ACTIONS</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($waybills as $waybill)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex items-center space-x-2">
                            <span>{{ $waybill->waybill_number }}</span>
                            <button onclick="copyToClipboard('{{ $waybill->waybill_number }}')" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" title="Copy waybill number">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $waybill->receiver_name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $waybill->receiver_address }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $waybill->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('waybills.show', $waybill) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                        <a href="{{ route('waybills.edit', $waybill) }}" class="text-blue-600 hover:text-blue-900 ml-2">Edit</a>
                        <form action="{{ route('waybills.destroy', $waybill) }}" method="POST" class="inline ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this waybill?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-6">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing {{ $waybills->firstItem() ?? 0 }} to {{ $waybills->lastItem() ?? 0 }} of {{ $waybills->total() }} waybills
            </div>
            <div>
                {{ $waybills->links() }}
            </div>
        </div>
    </div>
@endif 