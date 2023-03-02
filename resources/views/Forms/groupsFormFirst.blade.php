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
    <body class="antialiased h-screen w-screen" style="background-image: url('/bg/gplay.png')">
        @include('Components.navbar')
        <div class="flex justify-around items-center mt-5 h-[calc(100%-4rem)]">
            <div class="h-auto w-1/4 border-2 rounded-lg bg-gray-100">
                <form class="flex justify-around flex-col items-center w-full h-auto" action="{{route('prepareFormTwo')}}" method="post">
                    <div class="my-3"><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-2.5" type="text" placeholder="Gruppenname" name="groupName"></div>
                    <div class="my-3"><select name="classId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-2.5">
                        @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->klasse}}</option>
                        @endforeach
                    </select></div>
                    <div class="my-3"><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-2.5" type="number" name="studentCount" placeholder="Anzahl der Schüler"></div>
                    <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2 my-3" type="submit">
                </form>
            </div>
        </div>
    </body>
</html>