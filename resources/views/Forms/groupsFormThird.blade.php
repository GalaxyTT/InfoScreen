<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <title>Backend</title>

        <style>
            /*  npx tailwindcss -i ./resources/css/input.css -o ./public/css/output.css --watch */
        </style>
    </head>
    <body class="antialiased h-screen w-screen" style="background-image: url('/bg/gplay.png')">
        <form action="{{route('processForm')}}" method="post">
            <input type="hidden" name="groupName" value="{{$groupName}}">
            <input type="hidden" name="classId" value="{{$classId}}">
            <input type="hidden" name="students" value="{{$students}}">
            <div id="dateContainer">
            <div id="singleDate">
                <input type="date" name="dates[]">
                <select name="teachers[]">
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->lehrer}}</option>
                    @endforeach
                </select>
                <select name="rooms[]">
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->raum}}</option>
                    @endforeach
                </select>
                <input type="text" name="exercises[]" placeholder="Laborübung">
            </div>
            </div>
            <button onclick="createNew();" type="button">add</button>
            <input type="submit">
        </form>
    </body>
    <script>
        function createNew(){
            cont = document.getElementById('singleDate');
            parent = document.getElementById('dateContainer');
            parent.insertAdjacentHTML('afterend', cont.outerHTML);
        }
    </script>
</html>