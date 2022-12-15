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
        <div class="flex justify-center w-screen h-screen">
            <div class="bg-zinc-800 w-2/12 h-screen">
                <div class="flex items-center h-16 w-full hover:bg-zinc-700 ease-in-out duration-300 border-b-2 border-zinc-700">
                    <div class="h-full w-full flex justify-center items-center">
                        <a class="text-white font-12"  href="{{route('classes')}}">Klassen</a>
                    </div>
                </div>
                <div class="flex items-center h-16 w-full hover:bg-zinc-700 ease-in-out duration-300 border-b-2 border-zinc-700">
                    <div class="h-full w-full flex justify-center items-center">
                        <a class="text-white font-12" href="{{route('groups')}}">Gruppen</a>
                    </div>
                </div>
                <div class="flex items-center h-16 w-full hover:bg-zinc-700 ease-in-out duration-300 border-b-2 border-zinc-700">
                    <div class="h-full w-full flex justify-center items-center">
                        <a class="text-white font-12" href="{{route('settings')}}">Einstellungen</a>
                    </div>
                </div>
            </div>
            <div class="w-10/12">
                @if($flag == 1)
                    @include('Components.classes', ['classes' => $classes])
                @elseif($flag == 2)
                    @include('Components.groups', ['groups' => $groups])
                @elseif($flag == 3)
                    @include('Components.settings', ['settings' => $settings])
                @else
                    @include('Components.default')
                @endif
            </div>
        </div>
    </body>
</html>