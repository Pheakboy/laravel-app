<x-layout>
    <x-slot name="title">Edit Chirp</x-slot>
    
    <div class="max-w-2xl mx-auto py-6 sm:py-8 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('chirps.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Chirps
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sm:p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Chirp</h1>

            <form action="{{ route('chirps.update', $chirp) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Message Field -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                        Message
                    </label>
                    <textarea 
                        id="message"
                        name="message" 
                        rows="6"
                        required
                        maxlength="255"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none @error('message') @enderror"
                        placeholder="What's on your mind?"
                    >{{ old('message', $chirp->message) }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">
                        <span id="char-count">0</span> / 255 characters
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3 pt-4">
                    <button 
                        type="submit"
                        class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm hover:shadow-md"
                    >
                        Update Chirp
                    </button>
                    <a 
                        href="{{ route('chirps.index') }}"
                        class="px-6 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        const messageInput = document.getElementById('message');
        const charCount = document.getElementById('char-count');
        
        messageInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        
        // Initialize count
        charCount.textContent = messageInput.value.length;
    </script>
    @endpush
</x-layout>

