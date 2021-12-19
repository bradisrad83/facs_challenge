<div>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @livewireStyles
        @livewireScripts
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="w-screen h-screen overflow-y-scroll container mx-auto bg-gray-200">
        <div class="pt-20 pb-10 container mx-auto">
            <div class="text-center bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-4xl font-bold">Welcome To the ToDo List Application!!!!!</h1>
                <p class="w-2/3 mx-auto text-xl mt-4">Always forget what needs to get done?  Well do we have the solution for you.  Get started by clicking New List Buttong below.</p>
            </div>
        </div>
        {{ $slot }}
    </body>

    </html>
</div>
