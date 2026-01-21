<x-layout>
    <x-slot name="title">View Chirp</x-slot>
    
    <div class="max-w-3xl mx-auto py-6 sm:py-8 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('chirps.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Chirps
            </a>
        </div>

        <x-chirp :chirp="$chirp" />
    </div>
</x-layout>

