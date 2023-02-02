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
            <div class="h-auto w-3/4 border-2 rounded-lg bg-gray-100">
                <div class="w-full flex justify-center">
                    <form action="{{route('saveStudent')}}" method="POST" class="flex justify-around items-center w-full h-20">
                        @csrf
                        <input type="hidden" name="id" value="-1">
                        <div class="flex justify-around items-center w-52">
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" type="text" name="vorname" value="" size="13" placeholder="Vorname"></div>
                        </div>
                        <div class="flex justify-around items-center w-52">
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" type="text" name="nachname" value="" size="13" placeholder="Nachname"></div>
                        </div>
                        <div class="flex justify-around items-center w-44">
                            <div class="mr-2"><label class="block text-base text-gray-500">Gruppe:</label></div>
                            <div><select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" name="gruppen_id">
                                    @foreach ($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-around items-center w-60">
                            <div class="mr-2"><label class="block text-base text-gray-500">Klasse:</label></div>
                            <div><select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" name="klassen_id">
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->klasse}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2" type="submit">
                    </form>
                </div>
                <div class="bg-white rounded-lg">
                    <div class="relative overflow-x-auto rounded-lg">
                        <form action="{{route('importStudents')}}" method="POST" class="flex justify-center items-center my-4" enctype="multipart/form-data">
                            @csrf 
                            <div><label class="block text-base text-gray-500">Excel Import:</label></div>
                            <div><input type="file" name="file" class="rounded-lg py-2 px-4 mx-5 bg-gray-900 text-white text-sm font-medium" id="chooseFile"></div>
                            <div><button type="submit" name="submit" class="rounded-lg py-2 px-4 mx-5 bg-gray-900 text-white text-sm font-medium">Schüler importieren</button></div>
                        </form>
                        <div class="flex justify-center items-center my-4">
                            <div><label class="block text-base text-gray-500">Suche:</label></div>
                            <div class="px-10"><input id="searchFor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block p-2.5" type="text" name="nachname" value="" placeholder="Nachname" size="13" onkeyup="search();"></div>
                            <div><button onclick="search();" class="rounded-lg py-2 px-4 bg-gray-900 text-white text-sm font-medium">Suchen</button></div>
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
                                        Gruppe
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
                                        {{$student->getClass()->klasse}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$student->gruppen_id != null ? $student->getGroup()->name : "--"}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{route('deleteStudent')}}" method="POST">
                                            <input type="hidden" name="id" value="{{$student->id}}"class="text-white">
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