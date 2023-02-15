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
    <body class="antialiased">
       <div class="relative rounded-xl overflow-auto p-8">
            @foreach ($klassen as $klasse)
                <div class="infoSlide">
                    <div class="grid grid-cols-2 gap-4 font-mono text-white text-sm text-center font-bold leading-6 bg-stripes-fuchsia rounded-lg">
                        <div class="col-span-2 p-4 rounded-lg shadow-lg bg-green-700">{{$klasse->klasse}}</div>
                        @foreach ($klasse->getGroups as $group)
                            <div class="p-4 rounded-lg shadow-lg bg-green-700	">
                                <div>{{$group->name}}</div>
                                <div>
                                    @foreach ($group->getStudents as $student)
                                        <div>{{$student->nachname . ", " . $student->vorname}}</div>
                                    @endforeach
                                </div>
                                <div class="">
                                    {{$group->getTeacher->lehrer}}
                                    {{$group->getRoom->raum}}                      
                                </div>
                            </div>
                        @endforeach
                    </div>   
                </div>
            @endforeach
        </div>

    
        <script>
            let slideIndex = {!!$slideIdx!!};
            let backToAdDelay = {!!$backToAdDelay!!}

            showSlides();

            function showSlides() 
            {
                let slides = document.getElementsByClassName("infoSlide");
                window.history.replaceState(null, document.title, "/info/" + (slideIndex + 1))

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