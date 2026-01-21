@if(session('success'))
    <div id="flash-success" class="fixed top-20 right-4 z-50 max-w-md w-full opacity-0 transform translate-y-2 transition-all duration-300">
        <div class="bg-green-50 border border-green-200 rounded-lg shadow-lg p-4 flex items-start gap-3">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
            <button onclick="this.closest('#flash-success').remove()" class="flex-shrink-0 text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flash = document.getElementById('flash-success');
            if (flash) {
                setTimeout(() => {
                    flash.classList.remove('opacity-0', 'translate-y-2');
                    flash.classList.add('opacity-100', 'translate-y-0');
                }, 100);
                
                setTimeout(() => {
                    flash.classList.remove('opacity-100');
                    flash.classList.add('opacity-0');
                    setTimeout(() => flash.remove(), 300);
                }, 5000);
            }
        });
    </script>
@endif

@if(session('error'))
    <div id="flash-error" class="fixed top-20 right-4 z-50 max-w-md w-full opacity-0 transform translate-y-2 transition-all duration-300">
        <div class="bg-red-50 border border-red-200 rounded-lg shadow-lg p-4 flex items-start gap-3">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
            </div>
            <button onclick="this.closest('#flash-error').remove()" class="flex-shrink-0 text-red-600 hover:text-red-800 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flash = document.getElementById('flash-error');
            if (flash) {
                setTimeout(() => {
                    flash.classList.remove('opacity-0', 'translate-y-2');
                    flash.classList.add('opacity-100', 'translate-y-0');
                }, 100);
                
                setTimeout(() => {
                    flash.classList.remove('opacity-100');
                    flash.classList.add('opacity-0');
                    setTimeout(() => flash.remove(), 300);
                }, 5000);
            }
        });
    </script>
@endif

