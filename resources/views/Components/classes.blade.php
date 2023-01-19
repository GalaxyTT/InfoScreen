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
            <div class="h-auto w-3/4 border-2 border-red-500">
                <div class="w-full flex justify-center">
                    <form action="{{route('createClass')}}" method="POST" class="flex justify-around items-center w-3/4 h-20">
                        @csrf
                        <div class="flex justify-around items-center w-60">
                            <div class="mr-4"><label class="block text-base text-white">Klassenname:</label></div>
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" type="text" name="name" value=""></div>
                        </div>
                        <input class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2" type="submit">
                    </form>
                </div>
                <div>
                    @foreach ($classes as $class)
                    <div class="justify-content items-center h-20 w-3/4">
                        <p class="text-white">{{$class->klasse}}</p>
                    </div>
                    @endforeach
                </div>             
            </div>
        </div>
    </body>
</html>