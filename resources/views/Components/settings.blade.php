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
    <body class="antialiased h-screen w-screen">
        @include('Components.navbar')
        <div class="flex justify-center mt-5">
            <div class="h-24 w-3/4 border-2 flex justify-center items-center bg-gray-100 rounded-lg">
                <div>
                <form action="{{route('updateSettings')}}" method="POST" class="flex justify-around">
                    @csrf
                    <input type="hidden" name="sName" value="duration">
                    <label class="block pt-3 text-sm font-medium text-gray-500">Dauer der Anzeige des Bildes:</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-1/6 p-2.5" type="text" name="value" value="{{$value}}">
                    <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 font-medium rounded-lg text-sm w-1/6" type="submit">
                </form>
                <div>
            </div>
        </div>
    </body>
</html>