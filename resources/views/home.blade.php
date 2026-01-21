<x-layout>
    <x-slot name="title">Welcome</x-slot>
    
    <div class="max-w-3xl mx-auto py-6 sm:py-8 px-4 sm:px-6 lg:px-8">
        <div class="space-y-4 sm:space-y-5">
            @forelse($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="text-center py-16 sm:py-20">
                    <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gray-100 mb-4">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2">No chirps yet</h3>
                    <p class="text-sm sm:text-base text-gray-500 max-w-sm mx-auto">Be the first to share something with the community!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>