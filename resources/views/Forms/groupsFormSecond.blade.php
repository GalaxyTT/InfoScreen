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
        <form action="{{route('prepareFormThird')}}" method="post">
            <input type="hidden" name="groupName" value="{{$groupName}}">
            <input type="hidden" name="classId" value="{{$classId}}">
            @for ($i = 0; $i < $studentCount; $i++)
                <select name="student[]" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5">
                    @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->vorname." ".$student->nachname}}</option>
                    @endforeach
                </select>
            @endfor
            <input type="submit">
        </form>
    </body>
</html>