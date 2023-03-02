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
        <div class="grid grid-cols-2 gap-4 h-5/6 mx-10 items-center">
            <div class="bg-white border-2 rounded-lg border-gray-200 mx-20">
                <div class="bg-gray-800 w-full h-10 rounded-t-lg flex flex-col justify-center">
                    <div><p class="text-center text-lg text-white font-200">Einzelnen Schüler erstellen</p></div>
                </div>
                <form action="{{route('saveStudent')}}" method="POST" class="flex justify-around items-center w-full">
                    <div class="flex justify-around flex-col">
                        @csrf
                        <input type="hidden" name="id" value="-1">
                        <div class="flex justify-around items-center w-72 py-4">
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-4 w-full" type="text" name="vorname" value="" size="28" placeholder="Vorname"></div>
                        </div>
                        <div class="flex justify-around items-center w-72 py-4">
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-4" type="text" name="nachname" value="" size="28" placeholder="Nachname"></div>
                        </div>
                        <div class="flex justify-around items-center w-72 py-4">
                            <div class="mr-2"><label class="block text-base text-gray-500">Klasse:</label></div>
                            <div>
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-4" name="klassen_id">
                                @foreach ($classes as $class)
                                    <option value="{{$class->id}}">{{$class->klasse}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-around items-center w-full py-4">
                            <div class="w-full"><input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full pt-4 pb-4" type="submit"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-white border-2 rounded-lg border-gray-200 mx-20">
                <div class="bg-gray-800 w-full h-10 rounded-t-lg flex flex-col justify-center">
                    <div><p class="text-center text-lg text-white font-200">Excel importieren</p></div>
                </div>
                <form action="{{route('importStudents')}}" method="POST" class="flex flex-col justify-center items-center my-4" enctype="multipart/form-data">
                    @csrf 
                    <div class="py-4"><input type="file" name="file" class="rounded-lg py-2 px-4 mx-5 bg-gray-800 text-white text-sm font-medium" id="chooseFile"></div>
                    <div class="py-4 w-1/2"><input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full pt-4 pb-4" type="submit"></div>
                </form>
            </div>
        </div>
    </body>
</html>