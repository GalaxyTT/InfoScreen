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
    <body class="antialiased h-screen w-screen rounded-lg">
        @include('Components.navbar')
        <div class="flex justify-center mt-5">
            <div class="h-auto w-3/4 border-2 bg-gray-100 rounded-lg">
                <div class="w-full flex justify-center">
                    <form action="{{route('saveGroup')}}" method="POST" class="flex justify-around items-center w-full h-20">
                        @csrf
                        <input type="hidden" name="id" value="-1">
                        <div class="flex justify-around items-center w-52">
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block p-2.5" type="text" name="name" value="" size="13" placeholder="Gruppe"></div>
                        </div>
                        <div class="flex justify-around items-center w-44">
                            <div class="mr-2"><label class="block text-base text-gray-500">Lehrer Kurzzeichen:</label></div>
                            <div><select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block p-2.5" name="lehrer_id">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->lehrer}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-around items-center">
                            <div class="mr-2"><label class="block text-base text-gray-500">Raum:</label></div>
                            <div><select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block p-2.5" name="raum_id">
                                    @foreach ($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->raum}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2" type="submit" value="Gruppe erstellen">
                    </form>
                </div>
                <div class="bg-white rounded-lg">
                    <div class="relative overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gruppenname
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Lehrer
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Raum
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                <tr class="bg-white dark:bg-gray-800 even:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$group->id}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$group->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$group->getTeacher->lehrer}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$group->getRoom->raum}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{route('deleteGroup')}}" method="POST">
                                            <input type="hidden" name="id" value="{{$group->id}}"class="text-white">
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