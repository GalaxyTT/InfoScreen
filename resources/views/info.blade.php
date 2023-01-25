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
            let slideIndex = 0;

            showSlides();

            function showSlides() 
            {
                let i;
                let slides = document.getElementsByClassName("infoSlide");

                for (i = 0; i < slides.length; i++) 
                {
                    slides[i].style.display = "none";
                }

                slideIndex++;
                if (slideIndex > slides.length) 
                {
                    slideIndex = 1;
                }

                slides[slideIndex-1].style.display = "block";

                //setTimeout(showSlides, 5000);
            }
        </script>
    </body>
</html>