@props(['chirp'])

@php
    $user = $chirp->user;
    $userInitial = strtoupper(substr($user?->name ?? 'A', 0, 1));
    
    // Generate Gravatar URL if user has email
    $gravatarUrl = null;
    if ($user?->email) {
        $hash = md5(strtolower(trim($user->email)));
        $gravatarUrl = "https://www.gravatar.com/avatar/{$hash}?s=128&d=identicon";
    }
    
    // Generate color based on user name for consistent colors
    $colors = [
        'from-blue-500 to-blue-600',
        'from-purple-500 to-purple-600',
        'from-pink-500 to-pink-600',
        'from-green-500 to-green-600',
        'from-yellow-500 to-yellow-600',
        'from-red-500 to-red-600',
        'from-indigo-500 to-indigo-600',
        'from-teal-500 to-teal-600',
    ];
    $colorIndex = $user ? (crc32($user->name) % count($colors)) : 0;
    $gradientClass = $colors[$colorIndex];
@endphp

<article class="group bg-white rounded-xl shadow-sm border border-gray-200/60 hover:shadow-md hover:border-gray-300/60 transition-all duration-300 overflow-hidden">
    <div class="p-5 sm:p-6">
        <div class="flex items-start gap-4">
            <!-- User Avatar -->
            <div class="shrink-0">
                @if($gravatarUrl)
                    <div class="relative group/avatar">
                        <img 
                            src="{{ $gravatarUrl }}" 
                            alt="{{ $user->name ?? 'User' }}"
                            class="h-12 w-12 sm:h-14 sm:w-14 rounded-full object-cover border-2 border-gray-100 shadow-sm group-hover/avatar:border-blue-300 transition-all duration-200"
                        >
                        <div class="absolute inset-0 rounded-full bg-linear-to-br {{ $gradientClass }} opacity-0 group-hover/avatar:opacity-10 transition-opacity duration-200"></div>
                    </div>
                @else
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-full bg-linear-to-br {{ $gradientClass }} flex items-center justify-center text-white font-bold text-lg sm:text-xl shadow-sm group-hover:shadow-md transition-all duration-200 ring-2 ring-gray-50">
                        {{ $userInitial }}
                    </div>
                @endif
            </div>
            
            <!-- Chirp Content -->
            <div class="flex-1 min-w-0">
                <!-- User Info Header -->
                <div class="flex items-start justify-between gap-3 mb-3">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900 group-hover:text-gray-950 transition-colors">
                                {{ $chirp->user?->name ?? 'Anonymous' }}
                            </h3>
                            @if($chirp->user?->email)
                                <span class="hidden sm:inline-flex items-center gap-1 text-xs text-gray-500 font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="truncate max-w-37.5">{{ $chirp->user->email }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Action Buttons (only for chirp owner) -->
                    @can('update', $chirp)
                        <div class="flex items-center gap-1">
                            <a 
                                href="{{ route('chirps.edit', $chirp) }}"
                                class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                title="Edit chirp"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            @can('delete', $chirp)
                                <form 
                                    action="{{ route('chirps.destroy', $chirp) }}" 
                                    method="POST" 
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this chirp?');"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                        title="Delete chirp"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    @endcan
                </div>
                
                <!-- Message Content -->
                <div class="mb-4">
                    <p class="text-[15px] sm:text-base text-gray-700 leading-relaxed whitespace-pre-wrap wrap-break-word">
                        {{ $chirp->message }}
                    </p>
                </div>
                
                <!-- Footer with Timestamp -->
                <div class="flex items-center gap-3 text-xs sm:text-sm text-gray-500">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <time datetime="{{ $chirp->created_at->toIso8601String() }}" class="font-medium">
                            {{ $chirp->created_at->diffForHumans() }}
                        </time>
                    </div>
                    @if($chirp->created_at != $chirp->updated_at)
                        <span class="flex items-center gap-1.5 text-gray-400">
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span>Edited</span>
                            </span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Subtle bottom accent line -->
    <div class="h-0.5 bg-linear-to-r from-transparent via-gray-100 to-transparent group-hover:via-blue-100 transition-colors duration-300"></div>
</article>
