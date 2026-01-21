<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Laravel' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body class="min-h-screen flex flex-col pt-15">
    <x-navbar />
    <x-flash-messages />
    <main class="flex-1 w-full">
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>