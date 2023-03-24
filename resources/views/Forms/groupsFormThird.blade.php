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
    <body class="antialiased h-screen w-screen flex justify-center items-center" style="background-image: url('/bg/gplay.png')">
        <div class="h-auto bg-white border-2 border-gray-100 rounded-xl w-1/3 flex justify-center">
            <div><form action="{{route('processForm')}}" method="post">
                <input type="hidden" name="groupName" value="{{$groupName}}">
                <input type="hidden" name="classId" value="{{$classId}}">
                <input type="hidden" name="students" value="{{$students}}">
                <div id="dateContainer">
                    <div id="singleDate">
                        <input type="date" name="dates[]">
                            <select name="teachers[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-4 my-4">
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->lehrer}}</option>
                            @endforeach
                            </select>
                            <select name="rooms[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-4 my-4">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->raum}}</option>
                            @endforeach
                            </select>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-2.5" type="text" name="exercises[]" placeholder="Laborübung">
                    </div>
                    <button type="button" id="i" onclick="document.body.removeChild(this.parentNode)">Entfernen</button>
                </div>
                <button onclick="createNew();" type="button">Neues Datum</button>
                
                <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-1/6 pt-2 pb-2 my-3" type="submit">
            </form></div>
        </div>
    </body>
    <script>
        function createNew(){
            cont = document.getElementById('singleDate');
            parent = document.getElementById('dateContainer');
            parent.insertAdjacentHTML('afterend', cont.outerHTML);
        }
    </script>
</html>