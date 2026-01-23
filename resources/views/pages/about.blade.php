<x-layout>
    <x-slot name="title">About Us</x-slot>

    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">About Us</h1>
            <p class="text-lg text-gray-600">Learn more about our platform</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 space-y-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Welcome to Chirper</h2>
                <p class="text-gray-600 leading-relaxed">
                    Chirper is a modern social platform where you can share your thoughts, 
                    ideas, and connect with others. Built with Laravel and designed with simplicity in mind.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    To provide a clean, simple, and enjoyable platform for people to share their thoughts 
                    and engage in meaningful conversations.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Features</h3>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>Create and share chirps</li>
                    <li>Edit and delete your own posts</li>
                    <li>View chirps from all users</li>
                    <li>Manage your chirps easily</li>
                </ul>
            </div>
        </div>
    </div>
</x-layout>
