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
        <div class="bg-white border-2 rounded-lg border-gray-200 mx-96 my-20">
            <div class="bg-gray-800 w-full h-10 rounded-t-lg flex flex-col justify-center">
                <div><p class="text-center text-lg text-white font-200">Bilder hochladen</p></div>
            </div>
            <form action="{{route('uploadImage')}}" method="POST" class="flex flex-col justify-center items-center my-4" enctype="multipart/form-data">
                @csrf 
                <div class="py-4"><input type="file" name="images[]" multiple class="rounded-lg py-2 px-4 mx-5 bg-gray-800 text-white text-sm font-medium" id="chooseFile"></div>
                <div class="py-4 w-1/2"><input class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full pt-4 pb-4" type="submit"></div>
            </form>    
        </div>
        <div class="grid grid-cols-3 gap-x-6 gap-y-10 mx-6">
            @foreach($images as $image)
                <div class="flex flex-col">
                    <div class="mb-2.5"><img src="{{ $image }}"></div>
                    <form action="{{ route('deleteImage', ['image' => $image]) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex justify-center text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full pt-4 pb-4">Remove</button>
                    </form>
                </div>
            @endforeach
        </div>   
    </body>
</html>