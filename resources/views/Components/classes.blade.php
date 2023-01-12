<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <title>Backend</title>

        <style>
            /* npx tailwindcss -i ./resources/css/input.css -o ./public/css/output.css --watch */
        </style>
    </head>
    <body class="antialiased h-screen w-screen bg-zinc-900">
        @include('Components.navbar')
        <div class="flex justify-center">
            <div class="h-24 w-3/4 border-2 border-red-500 flex justify-center items-center">
                <div>
                <form action="{{route('createClass')}}" method="POST" class="flex justify-around">
                    @csrf
                    <label class="block pt-3 text-sm font-medium text-white">Klassenname</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-1/6 p-2.5" type="text" name="name" value="">
                    <input class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-1/6" type="submit">
                </form>
                <div>
            </div>
        </div>
    </body>
</html>