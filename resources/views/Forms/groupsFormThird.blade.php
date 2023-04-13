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
        <div class="h-auto bg-gray-100 border-2 rounded-lg w-2/4 flex justify-center">
            <div><form action="{{route('processForm')}}" method="post">
                <input type="hidden" name="groupName" value="{{$groupName}}">
                <input type="hidden" name="classId" value="{{$classId}}">
                <input type="hidden" name="students" value="{{$students}}">
                <div calss="flex justify-center">
                    <button class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-auto px-10 py-2 my-4" onclick="createNew();" type="button">Neues Datum</button>
                </div>
                <div id="dateContainer" class="grid grid-flow-col auto-cols-max mx-4 gap-2">
                    <div id="singleDate" class="p-4 border-2 rounded-lg">
                        <input type="date" name="dates[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block p-2.5 my-4" type="text" name="exercises[]" placeholder="Laborübung">
                        <button type="button" id="i" class="w-full text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm pt-2 pb-2" onclick="this.parentNode.remove()">Entfernen</button>
                    </div>
                </div>                
                <input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-auto p-2 my-4" type="submit">
            </form></div>
        </div>
    </body>
    <script>
        function createNew(){
            cont = document.getElementById('singleDate');
            parent = document.getElementById('dateContainer');
            parent.insertAdjacentHTML('beforeend', cont.outerHTML);
        }
    </script>
</html>