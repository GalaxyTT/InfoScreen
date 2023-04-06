<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <title>Info</title>

        <style>
            /* npx tailwindcss -i ./resources/css/input.css -o ./public/css/output.css --watch */
        </style>

    </head>
    <body class="antialiased"  style="background-image: url('/bg/gplay.png')">
        @foreach ($klassen as $klasse)
            <div class="infoSlide">
                <div class="text-8xl p-16 shadow-lg bg-green-700 font-mono text-white text-center font-bold leading-6 uppercase">{{$klasse->klasse}} - {{date("d.m.Y", strtotime($date))}}</div>
                    <div class="relative overflow-auto p-8 grid grid-cols-3 gap-4 font-mono text-white text-center font-bold leading-6 bg-stripes-fuchsia rounded-lg">
                    @foreach ($frontendGroups as $frontendGroup)
                        @if($frontendGroup['class'] == $klasse)
                            <div class="p-4 rounded-lg shadow-lg bg-green-700 flex flex-col justify-between">
                                <div class="text-4xl flex justify-between mb-10">
                                    <div class="text-left w-1/3">{{$frontendGroup['name']}}</div>
                                    <div class="text-center w-1/3">Lehrer: {{$frontendGroup['teacher']->lehrer}}</div>
                                    <div class="text-right w-1/3">Raum: {{$frontendGroup['room']->raum}}</div>
                                </div>
                                <div class ="text-3xl font-normal flex flex-col justify-center">
                                    @foreach ($frontendGroup['students'] as $student)
                                        <div class="leading-[3.75rem]">{{$student->nachname . " " . $student->vorname}}</div>
                                    @endforeach
                                </div>
                                <div class="text-4xl flex mt-10 justify-start">
                                    <div class="">Laborübung: {{$frontendGroup['exercise']}}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>   
            </div>
        @endforeach
    
        <script>
            let slideIndex = {!!$slideIdx!!};
            let backToAdDelay = {!!$backToAdDelay!!};

            showSlides();
            
            function showSlides() 
            {
                let slides = document.getElementsByClassName("infoSlide");

                window.history.replaceState(null, document.title, "/info/" + (slideIndex + 1));

                for (let i = 0; i < slides.length; i++) 
                {
                    slides[i].style.display = "none";
                }
                slides[slideIndex].style.display = "block";
                
                setTimeout(() => {
                    window.location.href = "http://localhost:8000/werbung";
                }, backToAdDelay);
            }
        </script>
    </body>
</html>