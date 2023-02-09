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
    <body class="antialiased h-screen w-screen">
        <form action="{{route('processForm')}}">
            <input type="text" placeholder="Name">
            <select>
                <option>1</option>
                <option>1</option>
                <option>1</option>
            </select>
            <input type="submit">
        </form>
    </body>
</html>