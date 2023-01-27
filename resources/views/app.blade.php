<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">


        <!-- Scripts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-vue/2.23.1/bootstrap-vue.min.css" integrity="sha512-YUqiEWiqDbBHeBWsrh+VDjFU6cMhVVmgjpBaoDhjMDhsfmfKVuU68KC0bFjWCgyD8B4LbcNc2p+1+NFtdYU9bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
