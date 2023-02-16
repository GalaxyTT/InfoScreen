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
        <div class="flex justify-center mt-5">
            <div class="h-auto w-3/4 border-2 rounded-lg bg-gray-100">
                <div class="w-full flex justify-center">
                    <form action="{{route('createTeacher')}}" method="POST" class="flex justify-around items-center w-3/4 h-20">
                        @csrf
                        <div class="flex justify-around items-center w-60">
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" type="text" name="lehrer" value="" placeholder="Lehrer"></div>
                        </div>
                        <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2" type="submit" value="Lehrer erstellen">
                    </form>
                </div>
                <div class="bg-white">
                    <div class="relative overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-20 py-3">
                                        Lehrerkurzzeichen
                                    </th>
                                    <th scope="col" class="px-20 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr class="bg-white dark:bg-gray-800 even:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$teacher->id}}
                                    </th>
                                    <td class="px-20 py-4">
                                        {{$teacher->lehrer}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{route('deleteTeacher')}}" method="POST">
                                            <input type="hidden" name="id" value="{{$teacher->id}}"class="text-white">
                                            <input class="text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-700 font-medium rounded-lg text-sm w-24 pt-2 pb-2" type="submit" value="Löschen">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>             
            </div>
        </div>
    </body>
</html>