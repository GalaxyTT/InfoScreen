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
                    <form action="{{route('saveGroup')}}" method="POST" class="flex justify-around items-center w-full h-20">
                        @csrf
                        <input type="hidden" name="id" value="-1">
                        <div class="flex justify-around items-center w-52">
                            <div class="mr-4"><label class="block text-base text-white">Gruppe:</label></div>
                            <div><input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" type="text" name="name" value="" size="13"></div>
                        </div>
                        <div class="flex justify-around items-center w-44">
                            <div class="mr-2"><label class="block text-base text-white">Lehrer Kurzzeichen:</label></div>
                            <div><select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" name="lehrer_id">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->lehrer}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-around items-center">
                            <div class="mr-2"><label class="block text-base text-white">Raum:</label></div>
                            <div><select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5" name="raum_id">
                                    @foreach ($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->raum}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2" type="submit">
                    </form>
                </div>
                <div>
                    @foreach ($groups as $group)
                    <div class="flex justify-around items-center h-20 w-3/4">
                        <p class="text-white">{{$group->name}}</p>
                        <p class="text-white">{{$group->getTeacher->lehrer}}</p>
                        <p class="text-white">{{$group->getRoom->raum}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>