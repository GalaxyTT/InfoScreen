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
    <body class="antialiased h-screen w-screen flex justify-center items-center" style="background-image: url('/bg/gplay.png')">
        <div class="h-auto border-2 bg-gray-100 rounded-lg w-1/4 flex justify-center">
            <div><form action="{{route('prepareFormThird')}}" method="post">
                <input type="hidden" name="groupName" value="{{$groupName}}">
                <input type="hidden" name="classId" value="{{$classId}}">
                @for ($i = 0; $i < $studentCount; $i++)
                    <select name="student[]" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-4 my-4">
                        @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->vorname." ".$student->nachname}}</option>
                        @endforeach
                    </select>
                @endfor
                <input class="w-full text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2 my-3" type="submit">
            </form></div>
        </div>
    </body>
</html>