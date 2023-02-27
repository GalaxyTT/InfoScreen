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
                <div class="bg-white rounded-lg">
                    <div class="relative overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-20 py-3">
                                        Beschreibung
                                    </th>
                                    <th scope="col" class="px-20 py-3 text-center">
                                        Eingabe
                                    </th>
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $setting)   
                                    <tr class="bg-white dark:bg-gray-800 even:bg-gray-50">
                                        <form action="{{route('updateSettings')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="sName" value="{{$setting->settingName}}">
                                            <th scope="row" class="px-20 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$setting->description}}
                                            </th>
                                            <td class="px-20 py-4">
                                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg foc us:ring-gray-700 focus:border-gray-700 block w-full p-2.5" type="text" name="value" value="{{$setting->value}}">
                                            </td>
                                            <td class="px-6 py-4 flex justify-end">
                                                <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 font-medium rounded-lg text-sm w-full p-2.5" type="submit">
                                            </td>
                                        </form>
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