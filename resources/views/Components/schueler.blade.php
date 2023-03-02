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
                <div class="rounded-lg">
                    <div class="relative overflow-x-auto rounded-lg">              
                        <div class="flex justify-center items-center my-4">
                            <div><label class="block text-base text-gray-500">Suche:</label></div>
                            <div class="px-10"><input id="searchFor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block p-2.5" type="text" name="nachname" value="" placeholder="Nachname" size="13" onkeyup="search();"></div>
                            <div><button onclick="search();" class="rounded-lg py-2 px-4 bg-gray-800 text-white text-sm font-medium hover:bg-gray-700">Suchen</button></div>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Vorname
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nachname
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Klasse
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr class="bg-white even:bg-gray-50 dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->id}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$student->vorname}}
                                    </td>
                                    <td class="px-6 py-4 nachname">
                                        {{$student->nachname}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$student->getClass->klasse}}
                                    </td>
                                    <td class="px-6 py-4 flex justify-end">
                                        <div>
                                            <form action="{{route('deleteStudent')}}" method="POST">
                                                <input type="hidden" name="id" value="{{$student->id}}"class="text-white">
                                                <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 font-medium rounded-lg text-sm w-24 pt-2 pb-2" type="submit" value="Löschen">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed bottom-8 right-8">
                <a class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-6xl px-[1.125rem]" href="{{route('createStudent')}}">
                    <svg width="46px" height="46px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline relative" style="top: -9px;">
                        <path d="M5 12H19" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 5L12 19" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        <script>
            function search(){
                var inputField = document.getElementById("searchFor");
                var tables = document.getElementsByClassName("nachname");
                Array.prototype.forEach.call(tables, (table) => {
                    if(!table.textContent.toUpperCase().includes(inputField.value.toUpperCase())){
                        table.parentElement.style = "display: none;"
                    }
                    else{
                        table.parentElement.style = "";
                    }
                });
            }
        </script>
    </body>
</html>