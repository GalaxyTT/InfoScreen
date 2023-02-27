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
    <body class="antialiased h-screen w-screen rounded-lg" style="background-image: url('/bg/gplay.png')">
        @php 
            foreach($groups as $group)
            {
                dump(json_decode($group->json));
            }
        @endphp
        @include('Components.navbar')
        <div class="flex justify-center mt-5">
            <div class="h-auto w-3/4 border-2 bg-gray-100 rounded-lg">
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
                                        Klassenname
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Schüler
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
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$group->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$group->getClass()->klasse}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @foreach($group->getStudents() as $studtent)
                                            {{$studtent->vorname." "}}
                                            {{$studtent->nachname.", "}}
                                        @endforeach
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
        <div class="absolute bottom-8 right-8">
            <a class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-6xl px-5" href="{{route('prepareFormOne')}}">
                <svg width="46px" height="46px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline">
                    <path d="M5 12H19" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 5L12 19" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </body>
</html>